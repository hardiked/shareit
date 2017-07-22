
<?php

require 'common.php';
$email=$_SESSION['email'];
    $profiles_query = "SELECT * FROM users WHERE email='$email'";
    $profiles_result = mysqli_query($con,$profiles_query);
    $profile=mysqli_fetch_array($profiles_result);
if(isset($_SESSION['email'])){
    //header('loacation:products.php');
  if(isset($_POST['submit'])){
    move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
    //$con = mysqli_connect("localhost","root","","profiles");
    $q = mysqli_query($con,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE email = '".$_SESSION['email']."'");
    $profiles_query = "SELECT * FROM users WHERE email='$email'";
    $profiles_result = mysqli_query($con,$profiles_query);
    $profile=mysqli_fetch_array($profiles_result);
    header('Location:profilepage.php');
    
  }

    



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>your profile</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style></style>
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
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Share<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="sharenews.php">NEWS</a></li>
            <li><a href="share.php">Poem</a></li>
            
          </ul>
        </li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Find<span class="caret"></span></a>
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
<div class="container">
    <img src="bg.jpg" height="300px" width="1345px" style="margin-left:-9%;margin-top: -1.72%">
</div>
<div class="container">
    
    <?php
         if($profile['image'] == ""){
            echo "<img width='150px' height='150px' src='pictures/profile.png' alt='Default Profile Pic' style='margin-left:-5%;margin-top:-8%;border-radius:50%;'>";
            } else {
            echo "<img width='150px' height='150px' src='pictures/".$profile['image']."' alt='Profile Pic' style='margin-left:-5%;margin-top:-8%;border-radius:50%;'>";
            }
    ?>
    <div class="upload">
      <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="file" style="margin-left: -2.6%;margin-top: -1.5%;">
                        <input type="submit" name="submit" class="btn btn-primary" style="margin-top: 1%;margin-left: -3%;">
                </form>
    </div>
</div>
<div class="container" style="margin-top: 1%;">
  <button style="font-size:24px;margin-left: -3%;border-radius: 4px;background-color: gold;"><i class="fa fa-edit"></i> <a href="sendmessage.php">Send Message!</a></button>
</div>
<div class="profiles" style="margin-left:28%; margin-top: -7%;padding-left:3%;width:40%;font-size: 30px;font-style:Palatino;color:#922B21;background-color: grey;  ">
    	<div class="user">
    		<b>Name</b>:<i><?php echo $_SESSION['firstname']."  ".$_SESSION['lastname']; ?></i>
    	</div>
    	<hr>
    	<div class="user">
    		<b>Email</b>:<i><?php echo $_SESSION['email']; ?></i>
    	</div>
    	<hr>
    	<div class="user">
    		<b>Contact Number</b>:<i><?php echo $_SESSION['contactnumber']; ?></i>
    	</div>
    	<hr>
    	<div class="user">
    		<b>Country</b>:<i><?php echo $_SESSION['country']; ?></i>
    	</div>
    	
    </div>
</body>
</html>
<?php } else{
    echo "please login and try again";
    } ?>