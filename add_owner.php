<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "INVENTORY";

// Establishing connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling add operation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['owner_name']) && isset($_POST['mobile_number']) && isset($_POST['property_location']) && isset($_POST['property_type']) && isset($_POST['price_per_sqrft']) && isset($_POST['status'])) {
        // Retrieve data from POST request
        $ownerName = $_POST['owner_name'];
        $mobileNumber = $_POST['mobile_number'];
        $propertyLocation = $_POST['property_location'];
        $propertyType = $_POST['property_type'];
        $pricePerSqrft = $_POST['price_per_sqrft'];
        $status = $_POST['status'];

        // Prepare and execute SQL statement to insert new record
        $stmt = $conn->prepare("INSERT INTO owner_property (owner_name, mobile_number, property_location, property_type, price_per_sqrft, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", $ownerName, $mobileNumber, $propertyLocation, $propertyType, $pricePerSqrft, $status);
        if ($stmt->execute()) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    } else {
        echo "All fields are required";
    }
}

$conn->close();
?>
