<?php
  include "conn.php";
  session_start();
  if($_SESSION['loggedin']!=true)
  {
    header("location: login.php");
  }

  $username = $_SESSION['username'];
  $folder = "asset/user.png";
  $selectSql="SELECT * FROM `dp` WHERE `username` = '$username' AND `sn`=(SELECT max(sn) FROM `dp`);";
  $result = mysqli_query($conn, $selectSql);
  $data =mysqli_fetch_array($result);
  if ($data) {
      $folder = $data['folder'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Namaste - Home</title>
    <style>
    body
    {
      height: 100%;
      width: 100%;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand " href="#">
      <img src="asset/logo.png" class="rounded-circle" width="35" height="35" class="d-inline-block align-top" alt="Logo">
      Namaste 
    </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Messenger</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="#">Settings</a>
            </li>
          </ul>
        </div>
        <div class="nav-item dropdown">
            <a class="navbar-brand" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo $folder ?>" class="rounded-circle" width="30" height="30" class="d-inline-block align-top" alt="user">
              <?php echo $_SESSION['username']; ?> <i class="fa fa-caret-down" aria-hidden="true"></i>
            </a>
            <br>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Dashboard</a>
              <a class="dropdown-item" href="profile.php">Account</a>
              <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-xl" href="">Edit Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="sessionOut.php">Sign Out</a>
            </div>
        </div>
      </nav>

      <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content p-5">
          <form method = "POST">
              <div class="form-group row">
              <label class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-2 ">
                  <input type="text" readonly class="form-control-plaintext pl-2" id="staticEmail" placeholder="<?php echo $_SESSION['username']?> ">
                 </div>
                 <div class="col-sm-8 text-success"><span><i class="fa fa-check-circle" aria-hidden="true"></i></span> </div>
              </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">First Name</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="fn">
                  </div>
                  <label class="col-sm-2 col-form-label">Last Name</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="ln">
                  </div>
                </div>

                <div class="form-group row">
              <label class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" checked="checked" name="gender" value="male">
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" value="female">
                      <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                  </div>
              </div>

              <div class="form-group row">
              <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-6 ">
                  <input type="text" readonly class="form-control-plaintext pl-2" id="staticEmail" placeholder=" <?php echo $_SESSION['email']?> ">
                 </div>
                 <div class="col-sm-4">
                 <a href="#">Verify Email</a>
                 </div>
              </div>

              <div class="form-group row">
              <label class="col-sm-2 col-form-label">Mobile</label>
                  <div class="col-sm-6 ">
                  <input type="text" readonly class="form-control-plaintext pl-2" id="staticEmail" placeholder=" <?php echo $_SESSION['mobile']?> ">
                 </div>
                 <div class="col-sm-4">
                  <a href="#">Verify Mobile</a>
                 </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Work</label>
                  <div class="col-sm-10">
                <input type="text" class="form-control" name="work">
                </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">City</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="city">
                  </div>
                  <label class="col-sm-1 col-form-label">State</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="state">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                    <select name="country" class="form-control">
                        <option selected>India</option>
                        <option>USA</option>
                        <option>England</option>
                        <option>Sri Lanka</option>
                        <option>Bhutan</option>
                        <option>Nepal</option>
                      </select>
                    </div>
                </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form> 
          </div>
        </div>
      </div>

      <?php
      if($_POST)
      {
        $fn = $_POST['fn'];
        $ln = $_POST['ln'];
        $name = $fn." ".$ln;
        $work = $_POST['work'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];

        $updatesql = "INSERT INTO `profile` (`username`, `name`, `gender`, `work`, `city`, `state`, `country`, `date`) VALUES ('$username', '$name', '$gender', '$work', '$city', '$state', '$country', current_timestamp())";
        $updateResult = mysqli_query($conn, $updatesql);
        if($updateResult)
        {
          echo '<div class="alert alert-success" role="alert">
          Your profile has been updated.</div>';
        }
        else{
          echo "Profile has not been updated. ERROR!!!";
        }
      }
      ?>


      <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-interval="5000">
            <img src="https://images.unsplash.com/photo-1568992688065-536aad8a12f6?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1778&q=80" class="d-block w-100">
          </div>
          <div class="carousel-item" data-interval="2000">
            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1950&q=80" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" class="d-block w-100">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <script>
        $('.carousel').carousel({
          interval: 2000
        });
      </script>

</body>
</html>