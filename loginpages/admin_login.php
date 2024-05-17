<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placement_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$user = $_POST['username'];
$pass = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);

// Execute statement
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Admin login successful
    // Redirect to admin dashboard or any other page
    header("Location: admin_dashboard.html");
    exit(); // Ensure that no other code is executed after the redirect
} else {
    // Admin login failed
    echo "Invalid admin username or password.";
}

$stmt->close();
$conn->close();
?>
