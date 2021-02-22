<?php
      session_start();
      session_unset();
      session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="5;URL=index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signing Out</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/sessionOut.css" />
</head>
<body>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1><i class="fa fa-lock" aria-hidden="true"></i></h1>
			</div>
			<h2>You have been successfully signed out !!!</h2>
			<p >Redirecting you to the Sign In page again. <br> <br> <span id="count">5 seconds remaining... </span></p>    
			<a href="index.php">Sign In</a>
		</div>
	</div>
</body>
</html>
<script>
  var timeleft = 4;
  var timer = setInterval(function(){
    if(timeleft > 0){
      document.getElementById("count").innerHTML = timeleft + " seconds remaining... ";
    } 
    else {
      document.getElementById("count").innerHTML = "0 seconds remaining...";
    }
    timeleft -= 1;
  }, 1000);
</script>