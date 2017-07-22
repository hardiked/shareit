<?php

require 'common.php';
if(isset($_SESSION['email'])){
    //header('loacation:products.php');
  $email=$_SESSION['email'];
   $profiles_query = "SELECT * FROM users WHERE email='$email'";
    $profiles_result = mysqli_query($con,$profiles_query);
    $profile=mysqli_fetch_array($profiles_result);
  $a=0;
            $count_query = "SELECT * FROM mail WHERE recieve='$email'AND seen='$a'";
            $count_result = mysqli_query($con,$count_query);
            $rows1=mysqli_num_rows($count_result);
    

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
      <a class="navbar-brand" href="#">shareit.com</a>
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
      <li><a href="notification.php" onclick="zero(<?php echo $_SESSION['id']; ?>);"><i class="fa fa-bell-o" style="font-size:20px;"></i> Notification <?php if($rows1!=0){?><div class="count" style="margin-left:9%;margin-top:-33%;border:1px solid black;padding-left:2%;background-color:red;border-radius: 50%;color:white;width:15%;"><?php echo $rows1; ?></div><?php } ?></a></li>
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
<script type="text/javascript">
  function zero(article_id){
    $.post('zero.php',{article_id:article_id})
  }
</script>
<div class="container" style="display:inline; margin-top:0px;left:3%;position:fixed;width:100%;">
       <img src="kalam.jpg" class="img-rounded" style="margin-left:2%;height:300px;width:30%;"><br> <br>
       <img src="palgriasm.jpg" class="img-rounded" style="margin-left:2%;height:250px;width:30%;">
   </div>
 <div class="contain" style="left:45%;width:55%;position:fixed;height:100%;overflow:auto;">
      <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-right: 100px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="height:500px;">
      <div class="item active">
        <img src="narayan.jpg"  width="460px" height="400px">
      </div>

      <div class="item">
        <img src="english.jpg" width="460px" height="345px">
      </div>
      <div class="item">
        <img src="g.jpg" width="460px" height="345px">
      </div>
      

      <div class="item">
        <img src="kuvar.jpg"  width="460px" height="345px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

 </div>
   
   

</body>
</html>