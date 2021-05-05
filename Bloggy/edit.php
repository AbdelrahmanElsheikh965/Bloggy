<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog - Detail</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	
<section style="height: 9rem;" class="hero d-flex align-items-center">
  <div class="container">
    <div class="d-flex justify-content-center">
       <?php
            require("dbConfig.php");
            $id = $_GET['id'];
            $query =  "SELECT * FROM posts WHERE id = $id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $mydate = $row['mydate'];

      ?>
      <h1 class="font-weight-bold fs-1 text-white"><?php echo $title; ?></h1>
    </div>
  </div>
</section>

<main class="content bg-light container py-2">
  <div class="row">

    <article class="col-md-8">
      <div class="md-2 shadow">
        <img src="img/<?php echo $row['cover']; ?>" alt="" class="img-fluid">


          <div class="m-1 p-1">
            <div class="badges mb-1">
              
              <div class="my-4 d-flex justify-content-center"> 
                <h3> Now You can Edit the Content of the Blog. </h3>
              </div>

          <form action="" method="post">
	            <textarea name="contentArea" style="width: 700px; height: 200px"><?= $row['content'] ?></textarea>
          </div>
              	<button type="submit" name="submit-edit" class="btn btn-primary text-white mx-1">Save</button>
          </form>
          
          </div>
              <?php
              if (isset($_POST['submit-edit'])) {
              	 	$contentArea = $_POST['contentArea'];
	              	$query =  "UPDATE posts SET content = '$contentArea' WHERE id = $id";
      		        $result = mysqli_query($conn, $query);
      	        	header("Location: index-design.php");
		    	     }

              ?>

          <div class="my-4 d-flex justify-content-center">
          <p>
            <?php
              $email = $_SESSION['email'];
              $sqlQuery = "SELECT name, image FROM users WHERE email = '$email'";
              $ResRes = mysqli_query($conn, $sqlQuery);
              $rawResult = mysqli_fetch_array($ResRes);
            ?>
            
          </p>
          </div>

          <div class="p-2 bg-primary text-white">
            <div class="row">
              <div class="col-md-3 text-right">
                <!-- <img class="img-fluid rounded-circle" src="img/<?php echo $rawRes['image']; ?>" alt=""> -->
              </div>
              
                <p> Written by :/  </p> <br>
                <i> <?= $rawResult['name'] ?> </i>
                <p> __On__  </p> <br>
                <i> <?= $mydate ?> </i>
                <!-- <h3 class="m-0"><?= $_SESSION['email'] ?></h3> -->
              
            </div>
          </div>

      </div>
    </article>

    


  </div>
</main>

<footer>
<section style="height: 18.3rem;" class="hero py-4">
  <div class="d-flex container justify-content-center flex-wrap">
    <div class="container text-center">
      <h2 class="font-weight-bold">Bloggy</h2>
      <p>Bloggy is a website where you can register an account to create your own blogs with titles, contents, and cover photos describing your subject, and afterward, you can come back any time to see what you have written edit and delete them. </p>
      <br> <strong> Have fun ;) </strong>
    </div>

    <div class="credits text-center bp-2">
      <p>Made  by Abdo With &#10084; &copy; 2020 All Rights Reserved.</p>
    </div>
</div>
</section>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>