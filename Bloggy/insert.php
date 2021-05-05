<?php
session_start();
require_once("dbConfig.php");
$targetDir = 'img/';
		$email = $_SESSION['email'];
        $sqlQuery = "SELECT id FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $sqlQuery);
        $raw = mysqli_fetch_array($res);
        $id = $raw['id'];
 if(isset($_POST['submit']))
        {
			$title = htmlspecialchars($_POST['title']);
			$content = htmlspecialchars($_POST['content']);
			
			if (!empty($_FILES['image']['name'])) {
				$fileName = basename($_FILES['image']['name']);
				$fileTargetPath = $targetDir . $fileName;
				$fileType = pathinfo($fileTargetPath, PATHINFO_EXTENSION); 

				move_uploaded_file($_FILES['image']['tmp_name'], $fileTargetPath);

				// $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
				// $image = $_FILES['image']['temp_name'];
				// $imageContent = addslashes(file_get_contents($image));
				// $image = addslashes($_FILES['image']['temp_name']);
				// $name = addslashes($_FILES['image']['name']);
				// $image = file_get_contents($image);
				// $image = base64_encode($image);


				$add_query="INSERT INTO posts (title, content, cover, user_id) 
						  VALUES ('$title', '$content', '$fileName', $id)";
			  	mysqli_query($conn, $add_query);
			}else{
				$add_query="INSERT INTO posts (title, content, user_id) 
						  VALUES ('$title', '$content', $id)";
			  	mysqli_query($conn, $add_query);
			}
			header("Location: index-design.php");
        }

?>