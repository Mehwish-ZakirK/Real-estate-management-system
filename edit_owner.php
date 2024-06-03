<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "INVENTORY";

// Establishing connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling edit operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id']) && isset($_POST['field']) && isset($_POST['value'])) {
    $editId = $_POST['edit_id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE owner_property SET $field=? WHERE id=?");
    $stmt->bind_param("si", $value, $editId);
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close the database connection
$conn->close();
?>
