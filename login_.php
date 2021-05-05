<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
  <style type="text/css">
    .hero{
      height: 80rem;
      background: linear-gradient(to right, #525153, #cbcace) 
    }
  </style>
</head>
<body>
<section style="height: 9rem;" class="hero d-flex align-items-center">
  <div class="container py-5">
    <div class="d-flex justify-content-center">
      <h1 class="font-weight-bold fs-1 text-white">Login Page</h1>
    </div>
  </div>
</section>

<main style="margin: 25px auto; width: 50rem; height: 25rem; line-height: 2;" class="content bg-light container py-2">
<form method="post" action="login.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" value="<?= @$_COOKIE['email'] ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" value="<?= @$_COOKIE['password'] ?>" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="rememberMe" type="checkbox" class="form-check-input" id="exampleCheck1">
    &nbsp;&nbsp;<label class="form-check-label" for="exampleCheck1">Keep Me Looged in</label>
  </div><br>
  <button type="submit" class="btn btn-primary" name="sublogin">Login</button><br> 
  <br>  <p>New here ?! <a href="register.html">Register Your Account.</a></p>  <br>
</form>
</main>


</body>
</html>