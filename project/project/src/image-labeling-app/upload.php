<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Ensure the uploads directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Check if image file is a valid image type
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo json_encode(["status" => "success", "path" => $target_file]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error uploading the file."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "File is not a valid image."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No file uploaded."]);
}
?>
