<?php
session_start();
include_once 'dbConfig.php';
if (isset($_POST['sublogin'])) {
	$email = $_POST['email'];
	$email = htmlspecialchars($email);
	$password = $_POST['password'];
	$password = htmlspecialchars($password);
	$sqlQuery = "SELECT email, password FROM users WHERE email = '$email' AND password = '$password'";
	$res = mysqli_query($conn, $sqlQuery);
	$raw = mysqli_fetch_array($res);
	if (mysqli_num_rows($res) == 1) {
		$email = $raw['email'];
		$password = $raw['password'];
		$_SESSION['email'] = $email;
		if (! empty($_POST['rememberMe'])) {
			// cookies last for 2 days.
			setcookie("email", $email, time() + 2 * 24 * 60 * 60);
			setcookie("password", $password, time() + 2 * 24 * 60 * 60);
		}else{
			if (isset($_COOKIE['email'])) {
				setcookie("email", "");
			}
			if (isset($_COOKIE['password'])) {
				setcookie("password", "");
			}
		}	
		header("Location: wherever.php");
	}else{
		echo('<strong> Error! Wrong Email or Password!. </strong> .. You will be redirected to login form again in 1 2 . .');
		header("refresh:2; url=login_.php");
		exit();
	}
}

?>