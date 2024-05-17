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
    // Student login successful
    echo "Student login successful. Redirecting to student dashboard...";
    // Redirect to student dashboard or any other page
    header("Location: student_dashboard.html");
} else {
    // Student login failed
    echo "Invalid student username or password.";
}

$stmt->close();
$conn->close();
?>
