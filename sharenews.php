<?php

require 'common.php';
if(isset($_SESSION['email'])){
    //header('loacation:products.php');
    $email=$_SESSION['email'];
   $profiles_query = "SELECT * FROM users WHERE email='$email'";
    $profiles_result = mysqli_query($con,$profiles_query);
    $profile=mysqli_fetch_array($profiles_result);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home Page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">shareit.com</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Share<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="sharenews.php">NEWS</a></li>
            <li><a href="share.php">Poem</a></li>
            
          </ul>
        </li>
        <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Find<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="findnews.php">NEWS</a></li>
            <li><a href="findpoems.php">Poem</a></li>
            
          </ul>
        </li>
        <li><a href="allusers.php">All Users</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
      <li><a href="notification.php" onclick="zero(<?php echo $_SESSION['id']; ?>);"><i class="fa fa-bell-o" style="font-size:20px;"></i> Notification <div class="count" style="margin-left:9%;margin-top:-33%;border:1px solid black;padding-left:2%;background-color:red;border-radius: 50%;color:white;width:15%;"></div></a></li>
      <?php
         if($profile['image'] == ""){
            echo "<img width='200px' height='200px' src='pictures/profile.png' alt='Default Profile Pic' style='width:35px;height:35px;float:left;margin-top:3%;border-radius: 50%;'>";
            } else {
            echo "<img width='150px' height='150px' src='pictures/".$profile['image']."' alt='Profile Pic' style='width:35px;height:35px;float:left;margin-top:3%;border-radius: 50%;'>";
            }
    ?>
           <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hello <?php echo $_SESSION['firstname']."  ".$_SESSION['lastname'];?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profilepage.php">Your Profile</a></li>
            <li><a href="logout.php">Log Out</a></li>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container c" style="margin-top:5%;margin-left:33%;width:40%;">

<div style="background-color: turquoise;border-top-left-radius: 5px;border-top-right-radius: 5px; ">
    <div class="container" style="margin-top:10%;margin-left:25%;width:45%;">
      <ul class="nav nav-tabs" role="tablist" style="color:red;">
        <li class="active" style="border-bottom: 3px solid blue;"><a href="#">SUBMIT NEWS</a></li>
      </ul></div>
      <div class="panel panel-primary" style="margin-top:0%;">
      <div class="panel-body">
                            <form method="post" action="sharenews_submit.php">
                                <input type="text" class="form-control form-group input-lg" placeholder="Date(dd/mm/yyyy)" name="date" required>
                                <input type="text" class="form-control form-group input-lg" placeholder="Place" name="place" required>
                                <input type="text" class="form-control form-group input-lg" placeholder="Subject" name="subject" required>
                                <textarea rows="4" cols="50" placeholder="Type NEWS Here...." class="form-control form-group input-lg" name="news" required></textarea>
                                <input type="Submit" class="btn btn-primary" value="Publish">
                            </form>
                        </div>
                        </div>
    </div>
    </div>
 
</body>
</html>