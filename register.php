<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	// get form data
	$username = $_POST["username"];
	$password = $_POST["password"];

	// store username and password in a file
	$file = fopen("users.txt", "a");
	fwrite($file, "$username|$password\n");
	fclose($file);

	// redirect to login page
	header("Location: login.html");
	exit;
}
?>
