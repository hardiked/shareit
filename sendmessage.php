<?php

require 'common.php';
if(isset($_SESSION['email'])){
    //header('loacation:products.php');
    

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
  <script type="text/javascript" href="alert.js"></script>

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
      
      <?php
         if($_SESSION['image'] == ""){
            echo "<img width='200px' height='200px' src='pictures/profile.png' alt='Default Profile Pic' style='width:35px;height:35px;float:left;margin-top:5%;border-radius: 50%;'>";
            } else {
            echo "<img width='150px' height='150px' src='pictures/".$_SESSION['image']."' alt='Profile Pic' style='width:35px;height:35px;float:left;margin-top:5%;border-radius: 50%;'>";
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

<div style="background-color: turquoise;border-top-left-radius: 5px;border-top-right-radius: 5px;  ">
    <div class="container" style="margin-top:10%;margin-left:25%;width:45%;">
      <ul class="nav nav-tabs" role="tablist" style="color:red;">
        <li class="active" style="border-bottom: 3px solid blue;"><a href="#">SEND MESSAGE</a></li>
      </ul></div>
      <div class="panel panel-primary" style="margin-top:0%;">
      <div class="panel-body"><div class="from" style="height:40px;border:1px solid lightgrey;padding-left:3.2%;padding-top:1.1%;font-size:20px;margin-bottom: 2.5%;border-radius: 6px;">From:<?php echo $_SESSION['email'];?></div>
                            <form method="post" action="sendmessage_submit.php">
                                <input type="text" class="form-control form-group input-lg" placeholder="To(Copy the email address from All Users page)" name="to" required>
                                <textarea rows="4" cols="50" placeholder="Type Your Message Here...." class="form-control form-group input-lg" name="mail" required></textarea>
                                <input type="Submit" class="btn btn-primary" value="Sent">
                            </form>
                        </div>
                        </div>
    </div>
    </div>
       
</body>
</html>