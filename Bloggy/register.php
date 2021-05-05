<?php

include 'dbConfig.php';
$targetDir = 'img/';

if (isset($_POST['submit'])) {

	$password_1 = htmlspecialchars($_POST['password_1']);
	$password_2 = htmlspecialchars($_POST['password_2']);

	if ($password_1 == $password_2) {
		$password = $password_1;
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$gender = htmlspecialchars($_POST['gender']);
		// $image = $_FILES['image'];
		
		if (!empty($_FILES['image']['name'])) {
				$fileName = basename($_FILES['image']['name']);
				$fileTargetPath = $targetDir . $fileName;
				$fileType = pathinfo($fileTargetPath, PATHINFO_EXTENSION); 

				move_uploaded_file($_FILES['image']['tmp_name'], $fileTargetPath);
				$qry = "INSERT INTO users (name, email, password, image,  gender) 
							VALUES ('$name', '$email', '$password', '$fileName', '$gender')";
				$res = mysqli_query($conn, $qry);
			}else{
				$qry = "INSERT INTO users (name, email, password, gender) 
							VALUES ('$name', '$email', '$password', '$gender')";
				$res = mysqli_query($conn, $qry);
			}
		if ($res) {
			header("refresh:2 url=index-design.php");  
			echo 'You\'ll be redirected in about 2 secs. If not, click <a href="index-design.php">here</a>.';
		}else{
			echo("there is an error // " . mysqli_error($conn));
			echo '<script language="javascript">';
			echo 'alert("Email Already registered!")';
			echo '</script>';
			header( "refresh:1;url=register.html");
			echo 'You\'ll be redirected in about 1 secs. If not, click <a href="wherever.php">here</a>.';
		}
	}else{
		echo '<script language="javascript">';
		echo 'alert("Password do not match!")';
		echo '</script>';	
		include 'register.html';
	}
}else{
	echo('there is some issue');
}

?>