<?php
session_start();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["certificate"]["name"]);
$uploadOk = 1;

// Check if file is actually uploaded
if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_file)) {
    // Save certificate info to the database
    $conn = new mysqli("localhost", "root", "", "your_database");

    $description = $_POST['description'];
    $student_id = $_SESSION['student_id']; // Assuming student is logged in
    $sql = "INSERT INTO certificates (student_id, file_name, description, status) VALUES ('$student_id', '".basename($_FILES["certificate"]["name"])."', '$description', 'pending')";

    if ($conn->query($sql) === TRUE) {
        echo "Certificate uploaded and pending approval.";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
