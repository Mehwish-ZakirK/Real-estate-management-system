<?php
// Check if the delete_id is set in the POST request
if(isset($_POST['delete_id'])) {
    // Retrieve the delete_id from the POST request
    $deleteId = $_POST['delete_id'];

    // Your database connection code (similar to what you have in owner_property.php)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "INVENTORY";

    // Establishing connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the delete query
    $stmt = $conn->prepare("DELETE FROM owner_property WHERE id=?");
    $stmt->bind_param("i", $deleteId);
    if ($stmt->execute()) {
        // If the deletion is successful, send a success message
        echo "Record deleted successfully";
    } else {
        // If there's an error during deletion, send an error message
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If delete_id is not set in the POST request, send an error message
    echo "Error: No delete ID provided";
}
?>
