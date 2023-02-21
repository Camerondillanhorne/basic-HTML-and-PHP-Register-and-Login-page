<?php
// database connection information
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "users";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // check if the username and password match a record in the database
    $sql = "SELECT * FROM user_details WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password. Please try again.";
    }
}

// close the database connection
$conn->close();
?>

