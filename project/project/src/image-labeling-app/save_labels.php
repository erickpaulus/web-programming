<?php
// Save received labels to labels.json
$data = file_get_contents("php://input");
file_put_contents("labels.json", $data);
echo "Labels saved successfully!";
?>
