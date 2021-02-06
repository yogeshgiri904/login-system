<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radhey Industries - Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Radhey Industries</a>
    <div class="d-flex">
    <a class="nav-link active" href="userpass.php">Sign In</a>
    <a class="nav-link" href="index.php">Sign Up</a>
    </div>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>


  <?php 
    if($_POST)
    {
      include 'conn.php';
      $email = $_POST["email"];
      $pass = $_POST["pass"];

      $sql = "SELECT * FROM `login` WHERE `email` LIKE '$email' AND `pass` LIKE '$pass'";
      $result = mysqli_query($conn, $sql);
      $check = mysqli_num_rows($result);
      if($check >= 1)
      {
        echo '<div class="alert alert-success" role="alert">
        Hey chief, Welcome Back
        </div>';
        header("location: music.html");
      }
      else
      {
        echo '<div class="alert alert-danger" role="alert">
        INVALID CREDANTIALS!!!
        </div>';
      }
    }
  ?>


<div class="p-5">
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"  class="form-label">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>