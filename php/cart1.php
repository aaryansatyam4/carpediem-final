<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cardholderName = $_POST["name"];
    $address = $_POST["address"];
    $cardNumber = $_POST["card_number"];
    $cardType = $_POST["card_type"];
    $expiryDate = $_POST["exp_date"];
    $cvv = $_POST["cvv"];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carpediem";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create orders table if not exists
    $sqlCreateTable = "
    CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        cardholder_name VARCHAR(255) NOT NULL,
        address VARCHAR(255) NOT NULL,
        card_number VARCHAR(16) NOT NULL,
        card_type VARCHAR(20) NOT NULL,
        expiry_date DATE NOT NULL,
        cvv INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
";

    if ($conn->query($sqlCreateTable) === FALSE) {
        die("Error creating table: " . $conn->error);
    }

    // Insert data into the database
    $sql = "INSERT INTO orders (cardholder_name, address, card_number, card_type, expiry_date, cvv)
            VALUES ('$cardholderName', '$address', '$cardNumber', '$cardType', '$expiryDate', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        echo "success"; // This message will be captured in your JavaScript
        header("Location: cart.php?success=true");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
