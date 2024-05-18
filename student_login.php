<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placement_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND role = 'student'");
$stmt->bind_param("ss", $user, $pass);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: home.html");
    exit();
} else {
    echo "Invalid student username or password.";
}

$stmt->close();
$conn->close();
?>
