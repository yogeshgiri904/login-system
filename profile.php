<?php
    session_start();
    if($_SESSION['loggedin']!=true)
    {
    header("location: login.php");
    }
?>
<?php
    include "conn.php";
    $username = $_SESSION['username'];
    $folder = "asset/user.png";
    $selectSql="SELECT * FROM `dp` WHERE `username` = '$username' AND `sn`=(SELECT max(sn) FROM `dp`);";
    $result = mysqli_query($conn, $selectSql);
    $data =mysqli_fetch_array($result);
    if ($data) {
        $folder = $data['folder'];
    }

    if ($_POST) {
        $fileName = $_FILES['userimg']['name'];
        $fileType = $_FILES['userimg']['type'];
        $fileTemp = $_FILES['userimg']['tmp_name'];
        $fileSize = $_FILES['userimg']['size'];
        $folder = "asset/$fileName";
        move_uploaded_file($fileTemp, $folder);

        if($fileSize==NULL)
        {
            echo '<div class="alert alert-danger" role="alert">
            Select another image from gallary first.</div>';
            if ($data) {
                $folder = $data['folder'];
            }
            else{
                $folder = "asset/user.png";
            }
        
        }
        else{
            $sql="INSERT INTO `dp` (`username`, `name`, `size`, `folder`, `date`) VALUES ('$username', '$fileName', '$fileSize', '$folder', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                echo '<div class="alert alert-success" role="alert">
                Your profile picture has been updated.</div>';
              }
              else{
                echo "Profile picture has not been updated. ERROR!!!";
              }
        }
    }

?>
<?php
    include "conn.php";
    $username = $_SESSION['username'];
    $sql="SELECT * FROM `profile` WHERE `username` = '$username' AND `sn`=(SELECT max(sn) FROM `profile`);";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    if($data)
    {
        $name = $data['name'];
        $work = $data['work'];
        $gender = $data['gender'];
        $city = $data['city'];
        $state = $data['state'];
        $country = $data['country'];
        $address = $city.", ".$state;
    }
    else
    {
        $name = $username;
        $work = "Add your work";
        $gender = NULL ;
        $city = NULL ;
        $state = NULL ;
        $country = "Add your country" ;
        $address = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username']." - Profile"; ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<div class="container emp-profile">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?php echo $folder;?>" alt="user"/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="userimg"/>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="profile-head">
                            <h4>
                            <?php echo $name; ?> <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                            </h4>
                            <br>
                            <h6>
                                <?php echo '<i class="fa fa-briefcase" aria-hidden="true"></i> '.$work;?>
                            </h6>
                            <h6>
                                <?php echo '<i class="fa fa-map-marker" aria-hidden="true"></i> '.$country;?>
                            </h6>
                            <br>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="profile-edit-btn">Edit Profile</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                        <div class="d-flex align-center justify-content-center">
                            <input type="submit" class="profile-edit-btn" name="submit" value="Upload"/>
                        </div>
                        <br>
                            <h5>IMPORTANT LINKS</h5>
                            <a href="home.php">Home</a><br/>
                            <a href="home.php">Dashboard</a><br/>
                            <a href="">Messenger</a><br/>
                            <a href="">Pricing</a><br/>
                            <a href="">Settings</a><br/>
                            <a href="sessionOut.php">Sign Out</a>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <?php echo $_SESSION['username']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                    <p> <?php echo $name; ?> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                    <p> <?php echo $_SESSION['email']; ?> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Mobile</label>
                                    </div>
                                    <div class="col-md-6">
                                    <p> <?php echo $_SESSION['mobile']; ?> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-6">
                                    <p> <?php echo $address; ?> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
             </form>  
        </div>
</body>
</html>