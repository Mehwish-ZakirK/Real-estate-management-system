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

// Function to handle CSV file import
function importCSV($file) {
    global $conn;
    // Check if file is uploaded successfully
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("File upload failed with error code " . $file['error']);
    }

    // Read CSV file
    $csvData = file_get_contents($file['tmp_name']);
    $lines = explode(PHP_EOL, $csvData);
    $stmt = $conn->prepare("INSERT INTO owner_property (owner_name, mobile_number, property_location, property_type, price_per_sqrft, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssds", $owner_name, $mobile_number, $property_location, $property_type, $price_per_sqrft, $status);
    foreach ($lines as $line) {
        $data = str_getcsv($line);
        if (count($data) == 6) { // Ensure each row has 6 columns
            list($owner_name, $mobile_number, $property_location, $property_type, $price_per_sqrft, $status) = $data;
            $stmt->execute();
        }
    }
    $stmt->close();
}

// Handle CSV file import if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['csv_file'])) {
    importCSV($_FILES['csv_file']);
    header("Location: owner-property.php"); // Redirect to the owner-property.php page after import
    exit();
}

$conn->close();
?>
