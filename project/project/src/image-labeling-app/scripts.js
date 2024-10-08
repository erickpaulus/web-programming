let canvas = document.getElementById("imageCanvas");
let ctx = canvas.getContext("2d");
let img = new Image();
let labels = [];
let isDrawing = false;
let isEditing = false;
let selectedLabel = null;
let resizeHandle = null;
let zoomLevel = 1.0;
let originX = 0;
let originY = 0;
let startX, startY, endX, endY;

// Class Definition for Label
class Label {
    constructor(x, y, width, height, name) {
        this.x = x;
        this.y = y;
        this.width = width;
        this.height = height;
        this.name = name;
    }

    // Method to check if a point is inside the label
    isPointInLabel(x, y) {
        return x > this.x && x < this.x + this.width && y > this.y && y < this.y + this.height;
    }

    // Method to check if a point is near a corner
    isPointNearHandle(x, y) {
        const handleSize = 6 / zoomLevel; // Handle size for resizing
        const corners = [
            { x: this.x, y: this.y }, // Top-left
            { x: this.x + this.width, y: this.y }, // Top-right
            { x: this.x, y: this.y + this.height }, // Bottom-left
            { x: this.x + this.width, y: this.y + this.height } // Bottom-right
        ];

        return corners.findIndex(corner => (
            x >= corner.x - handleSize && x <= corner.x + handleSize &&
            y >= corner.y - handleSize && y <= corner.y + handleSize
        )) !== -1;
    }

    // Method to resize the label
    resize(x, y) {
        const minWidth = 10 / zoomLevel;
        const minHeight = 10 / zoomLevel;
        this.width = Math.max(x - this.x, minWidth);
        this.height = Math.max(y - this.y, minHeight);
    }

    // Method to move the label
    move(x, y, offsetX, offsetY) {
        this.x = x - offsetX;
        this.y = y - offsetY;
    }
}

// Image Upload and Display
const uploadForm = document.getElementById("uploadForm");
uploadForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(uploadForm);
    fetch("upload.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            loadImageToCanvas(data.path);
        } else {
            alert(data.message);
        }
    });
});

// Load Image onto Canvas
function loadImageToCanvas(imagePath) {
    img.src = imagePath;
    img.onload = () => {
        canvas.width = img.width;
        canvas.height = img.height;
        drawImage();
    };
}

// Function to Draw Image and Labels
function drawImage() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.save();
    ctx.translate(originX, originY); // Panning
    ctx.scale(zoomLevel, zoomLevel); // Zooming
    ctx.drawImage(img, 0, 0); // Draw the image at the current zoom and origin

    // Draw Labels
    labels.forEach((label, index) => {
        ctx.strokeStyle = label === selectedLabel ? "blue" : "red"; // Highlight selected label
        ctx.lineWidth = 2 / zoomLevel; // Adjust line width for zoom
        ctx.strokeRect(label.x, label.y, label.width, label.height);
        ctx.font = `${14 / zoomLevel}px Arial`;
        ctx.fillStyle = label === selectedLabel ? "blue" : "red";
        ctx.fillText(`${label.name || "Label " + (index + 1)}`, label.x + 5, label.y + 15 / zoomLevel);

        // Draw Resize Handles
        if (label === selectedLabel) {
            drawResizeHandles(label);
        }
    });

    ctx.restore();
}

// Function to Draw Resize Handles
function drawResizeHandles(label) {
    const handleSize = 6 / zoomLevel; // Size of resize handles
    const corners = [
        { x: label.x, y: label.y }, // Top-left
        { x: label.x + label.width, y: label.y }, // Top-right
        { x: label.x, y: label.y + label.height }, // Bottom-left
        { x: label.x + label.width, y: label.y + label.height } // Bottom-right
    ];

    corners.forEach(corner => {
        ctx.fillStyle = "blue";
        ctx.fillRect(corner.x - handleSize / 2, corner.y - handleSize / 2, handleSize, handleSize);
    });
}

// Handle Mouse Wheel for Zooming
canvas.addEventListener("wheel", (e) => {
    e.preventDefault();
    const mouseX = (e.offsetX - originX) / zoomLevel;
    const mouseY = (e.offsetY - originY) / zoomLevel;

    if (e.deltaY < 0) {
        zoomLevel *= 1.1; // Zoom in
    } else {
        zoomLevel /= 1.1; // Zoom out
    }

    // Adjust origin to keep mouse position stable
    originX = e.offsetX - mouseX * zoomLevel;
    originY = e.offsetY - mouseY * zoomLevel;

    drawImage();
});

// Convert Screen Coordinates to Canvas Coordinates
function toCanvasCoords(x, y) {
    return {
        x: (x - originX) / zoomLevel,
        y: (y - originY) / zoomLevel,
    };
}

// Canvas Drawing and Label Manipulation Events
canvas.addEventListener("mousedown", (e) => {
    const { x, y } = toCanvasCoords(e.offsetX, e.offsetY);
    const clickedLabel = labels.find(label => label.isPointInLabel(x, y));

    if (clickedLabel) {
        if (clickedLabel.isPointNearHandle(x, y)) {
            // Start resizing if clicking on the corners
            resizeHandle = clickedLabel; // Start resizing
            isEditing = true;
        } else {
            // Start moving the label
            isEditing = true;
            selectedLabel = clickedLabel;
            startX = x - selectedLabel.x;
            startY = y - selectedLabel.y;
        }
    } else {
        isDrawing = true;
        selectedLabel = null; // Deselect any selected label
        startX = x;
        startY = y;
    }
});

canvas.addEventListener("mousemove", (e) => {
    const { x, y } = toCanvasCoords(e.offsetX, e.offsetY);

    if (isDrawing) {
        drawImage();
        endX = x;
        endY = y;
        ctx.strokeStyle = "blue";
        ctx.lineWidth = 2 / zoomLevel;
        ctx.strokeRect(startX, startY, endX - startX, endY - startY);
    } else if (isEditing) {
        if (resizeHandle) {
            // Resize the label
            resizeHandle.resize(x, y);
        } else if (selectedLabel) {
            // Move the label
            selectedLabel.move(x, y, startX, startY);
            drawImage();
        }
    } else {
        // Change cursor style based on hover over handles
        if (labels.some(label => label.isPointNearHandle(x, y))) {
            canvas.style.cursor = "nwse-resize"; // Cursor for resizing
        } else if (labels.some(label => label.isPointInLabel(x, y))) {
            canvas.style.cursor = "move"; // Cursor for moving
        } else {
            canvas.style.cursor = "default"; // Default cursor
        }
    }
});

canvas.addEventListener("mouseup", () => {
    if (isDrawing) {
        isDrawing = false;
        const name = prompt("Enter label name:") || "Label";
        labels.push(new Label(startX, startY, endX - startX, endY - startY, name));
    } else if (isEditing) {
        isEditing = false;
        if (resizeHandle) {
            resizeHandle = null; // Reset resize handle
        }
    }
    drawImage();
    displayLabels();
});

// Display Labels List
function displayLabels() {
    const labelsList = document.getElementById("labelsList");
    labelsList.innerHTML = "<h3>Annotations</h3>";
    labels.forEach((label, index) => {
        labelsList.innerHTML += `
            <div>
                Label ${index + 1}: (x: ${label.x.toFixed(2)}, y: ${label.y.toFixed(2)}, width: ${label.width.toFixed(2)}, height: ${label.height.toFixed(2)})
                <input type="text" value="${label.name || ''}" onchange="updateLabelName(${index}, this.value)" placeholder="Label Name" />
                <button onclick="deleteLabel(${index})">Delete</button>
            </div>`;
    });
}

// Update Label Name
window.updateLabelName = function(index, name) {
    labels[index].name = name;
    drawImage();
};

// Delete Label
window.deleteLabel = function(index) {
    labels.splice(index, 1);
    drawImage();
    displayLabels();
};

// Export Labels as JSON
window.exportToJSON = function() {
    const dataStr = JSON.stringify(labels, null, 2);
    const blob = new Blob([dataStr], { type: "application/json" });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = "labels.json";
    a.click();
    URL.revokeObjectURL(url);
};
