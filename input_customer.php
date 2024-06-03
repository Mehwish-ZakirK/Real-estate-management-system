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

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $number = $_POST['number'];
    $requirement = $_POST['requirement'];

    // Example: Insert data into the database using prepared statements
    $stmt = $conn->prepare("INSERT INTO customer_detail (name, number, requirement) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $number, $requirement);
    
    // Execute the SQL query
    if ($stmt->execute()) {
        // Return a success message
        echo "Record inserted successfully";
    } else {
        // Return an error message
        echo "Error inserting record: " . $conn->error;
    }
} else {
    // If the request method is not POST, return an error message
    echo "Error: Invalid request method";
}
?>
