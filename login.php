<?php
// Set MySQL database credentials
$servername = "localhost";
$username = "your-username";
$password = "your-password";
$dbname = "your-database-name";

// Create connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection to MySQL database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and execute SQL statement to insert user data into MySQL database
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->close();

    // Redirect to login page
    header("Location: login.html");
    exit;
}

// Close connection to MySQL database
$conn->close();
?>
