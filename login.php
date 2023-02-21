<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	// get form data
	$username = $_POST["username"];
	$password = $_POST["password"];

	// read user data from file
	$file = fopen("users.txt", "r");
	$found = false;
	while(!feof($file)) {
		$line = trim(fgets($file));
		list($stored_username, $stored_password) = explode("|", $line);
		if($username == $stored_username && $password == $stored_password) {
			$found = true;
			break;
		}
	}
	fclose($file);

	// redirect to appropriate page based on login success or failure
	if($found) {
		header("Location: welcome.html");
	} else {
		header("Location: login.html?error=1");
	}
	exit;
}
?>
