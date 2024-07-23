<?php
$host = 'localhost';
$username = 'root';
$password = ''; // Replace with your database password
$database = 'carpediem';

// Create a new database connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tableQuery = "CREATE TABLE IF NOT EXISTS main_order2(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) ,
    address VARCHAR(255)
)";

if (isset($_POST['submit'])) {
    $address = $_POST['address'];
    $userName = $_SESSION["user_name"];

    $insertQuery = "INSERT INTO main_order2 (user_name, address) VALUES ('ARYAN', '$address')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error placing order: " . $conn->error;
    }
}


$conn->close();
?>