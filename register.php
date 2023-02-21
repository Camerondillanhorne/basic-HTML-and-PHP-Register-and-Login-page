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

    // check if the username already exists in the database
    $sql = "SELECT * FROM user_details WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // insert the new user details into the database
        $sql = "INSERT INTO user_details (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// close the database connection
$conn->close();
?>

