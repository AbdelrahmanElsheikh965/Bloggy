<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Post</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  
</head>
<body>

<section style="height: 9rem;" class="hero d-flex align-items-center">
  <div class="container py-5">
    <div class="d-flex justify-content-center">
      <h1 class="font-weight-bold fs-1 text-white">Insert Your Post</h1>
    </div>
  </div>
</section>

<main class="content bg-light container py-5">
  <div class="row justify-content-center">
   <form class="col-md-7" enctype="multipart/form-data" action="insert.php" method="post">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input name="title" type="text" class="form-control" id="inputEmail3">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Content</label>
          <div class="col-sm-10">
            <textarea name="content" class="w-100 p-3"></textarea>
          </div>
        </div>

          <div class="form-group">
            <label>Upload Your Cover Photo.</label>
            <input type="file" name="image">
          </div>

            <div class="form-group row">
              <div class="col-sm-10">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
   </form>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>