<?php
session_start(); // Start the session (if not already started)

// Configuration for your database connection
$host = 'localhost';
$username = 'root';
$password = ''; // Replace with your database password
$database = 'carpediem';

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$error_message = "";

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        // Registration form submitted
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        // You should perform proper data validation and sanitization here

        // Check if the email is already registered
        $check_query = "SELECT * FROM signup WHERE email='$email'";
        $check_result = mysqli_query($connection, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $error_message = "Email is already registered.";
        } else {
            // Insert data into the 'signup' table
            $insert_query = "INSERT INTO signup (name, email, password) VALUES ('$name', '$email', '$password')";

            if (mysqli_query($connection, $insert_query)) {
                // Registration successful
                $_SESSION['user_name'] = $name; // Store the user's name in a session variable
                header('Location: carpediem.php'); // Redirect to the welcome page
                exit();
            } else {
                $error_message = "Error: " . $insert_query . "<br>" . mysqli_error($connection);
            }
        }
    } elseif (isset($_POST['login'])) {
        // Login form submitted
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        // You should perform proper data validation and sanitization here

        // Check if the provided email and password match
        $login_query = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
        $login_result = mysqli_query($connection, $login_query);

        if (mysqli_num_rows($login_result) > 0) {
            // Login successful
            $user_data = mysqli_fetch_assoc($login_result);
            $_SESSION['user_name'] = $user_data['name']; // Store the user's name in a session variable
            header('Location: carpediem.php'); // Redirect to the welcome page
            exit();
        } else {
            $error_message = "Invalid email or password.";
        }
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>BEAST LOGIN PAGE</title>
</head>
<body>

<div class="container" id="container">
    <div class="form-container sign-up">
        <form method="POST" action="">
            <h1>Create Account</h1>
            <div class="social-icons">
                <!-- Social icons here -->
            </div>
            <span>or use your email for registration</span>
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="register">Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in">
        <form method="POST" action="">
            <h1>Sign In</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>or use your email and password</span>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <?php
            if (!empty($error_message)) {
                echo "<p style='color: red;'>$error_message</p>";
            }
            ?>
            <a href="#">Forgot Your Password?</a>
            <button type="submit" name="login">Sign In</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Welcome Back!</h1>
                <p>Enter your personal details to use all of site features</p>
                <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Hello, Friend!</h1>
                <p>Register with your personal details to use all of site features</p>
                <button class="hidden" id="register">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script src="../js/login.js"></script>
</body>
</html>
