<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radhey Industries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Radhey Industries</a>
    <div class="d-flex">
    <a class="nav-link" href="userpass.php">Sign In</a>
    <a class="nav-link active" href="Signup.php">Sign Up</a>
    </div>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>


<?php
  include "conn.php";
  if($_POST)
  {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];


    $sql = "INSERT INTO `login` (`email`, `mobile`, `pass`, `name`, `date`) VALUES ('$email', '$mobile', '$pass', '$name', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      echo '<div class="alert alert-success" role="alert">
      Your account has been created successfully.
      </div>';
      header("location:userpass.php");
    }

  }
  
?>

<div class="p-5" >      
<form method="POST">
<div class="form-row">
    <div class="form-group col-md-6">
      <label>Name</label>
      <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group col-md-6">
      <label>Mobile</label>
      <input type="number" maxlength="10" name="mobile" class="form-control" >
    </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Email</label>
      <input type="email" name="email" class="form-control">
    </div>

    <div class="form-group col-md-6">
      <label>Password</label>
      <input type="password" name="pass" class="form-control">
    </div>
  </div>

  </div>
  </br>
  <button type="submit" name='signup' class="btn btn-primary">Sign Up</button>
</form>



    
</div>
</body>
</html>
