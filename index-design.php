<?php session_start(); ?>
      <?php 
      include 'dbConfig.php';
      if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $sqlQuery = "SELECT id, name, image FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $sqlQuery);
        $raw = mysqli_fetch_array($res);
        $image = $raw['image'];
        $u_id = $raw['id'];
        }else
        {
          header("Location: login_.php");
          exit();
        }
        $file_name="img/".$image;

        if(file_exists($file_name))
        {
           $path=$file_name;
        }
        else
        {
          $path="assets/img/guest.jpg";
        }
      ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
</head>
<body>
	<nav class="navbar navbar-expand-lg text-dark bg-light" class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <img style="width: 40px; height: 40px; margin-left: 155px;" alt="no profile!" class="img-fluid rounded-circle" src="<?php echo $path; ?>" >
            <div class="container">
                <a class="navbar-brand" href="index-design.php"> <?= $raw['name']; ?> </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>

            <form style="margin-right: 400px;" class="form-inline my-2 my-lg-0" action="" method="post">
              <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-primary my-2 my-sm-0" name="sub-search" type="submit">Search</button>
            </form>
              <a href="logout.php"> <button class="btn btn-danger my-2 my-sm-0" name="sub-search" type="submit">Logout</button> </a>  
            </div>
  </nav>

<?php include_once 'header.html'; ?>

<div class="d-flex justify-content-center" style="font-size: 23px;"> 
  <i> <a href="insert-design.php" target="blank">insert your post</a> </i> 
</div>

<main class="content bg-light container py-4">
  <section class="row">

 <?php
require_once("dbConfig.php");
if (isset($_POST['sub-search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM  posts WHERE user_id = $u_id 
                AND (title LIKE '%$search%' OR content LIKE '%$search%')";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $title = $row['title'];
      $mydate = $row['mydate'];
      echo '<article class="col-md-4 p-0">
          <div class="m-2 shadow">
              <img class="img-fluid" alt="" src="'; echo "img/".$row['cover'];  echo'">
              <div class="article-content p-2">
              <h2 class="fs-3 font-weight-bold">';

              echo '<a target="blank" href="detail.php?id='; echo $id; echo' "> ';

                 echo $title; echo'</a></h2>

                <div class="d-flex justify-content-between">
                  <p>'; echo substr($mydate, 0, 10); echo' </p>
                  <p><span class="badge badge-primary">Blog</span></p>
                </div>
              </div>
          </div>
      </article>';
       }
}else{
    
    $query = "SELECT * FROM posts WHERE user_id = $u_id";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $title = $row['title'];
      $mydate = $row['mydate'];
      echo '<article class="col-md-4 p-0">
          <div class="m-2 shadow">
              <img class="img-fluid" alt="" src="'; echo "img/".$row['cover'];  echo'">
              <div class="article-content p-2">
              <h2 class="fs-3 font-weight-bold">';

              echo '<a target="blank" href="detail.php?id='; echo $id; echo' "> ';

                 echo $title; echo'</a></h2>

                <div class="d-flex justify-content-between">
                  <p>'; echo substr($mydate, 0, 10); echo' </p>
                  <p><span class="badge badge-primary">Blog</span></p>
                </div>
              </div>
          </div>
      </article>';
       }
  }
   ?>

  </section>
</main>

<?php include_once 'footer.html'; ?>