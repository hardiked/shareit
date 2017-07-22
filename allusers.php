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
<nav class="navbar navbar-inverse" style="position: fixed;width: 100%;">
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
        <li class="active"><a href="#">All Users</a></li>
        
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
<?php
            $user1_query = "SELECT * FROM users WHERE userid!='$_SESSION[id]'";
            $user1_result = mysqli_query($con,$user1_query);
            $rows1=mysqli_num_rows($user1_result);
            ?>

    <?php
                while($rows1>0){
                  $row1=mysqli_fetch_array($user1_result);
                  ?>
                  <div class="container">
      <div class="profile" style="margin-left:25%; margin-top:7%;font-size: 30px;font-style:Palatino;color:#922B21; background-color: lightgrey;width:50%;padding:2%;">
      
      <div class="user">
        <b>Name</b>:<a href="userprofile.php?user_id=<?php echo $row1['userid']; ?>"><i><?php echo $row1['firstname']."  ".$row1['lastname']; ?></i></a>
      </div>
      <br>
      <div class="user">
        <b>Email</b>:<i><?php echo $row1['email']; ?></i>
      </div>
      <br>
      <div class="user">
        <b>Contact Number</b>:<i><?php echo $row1['contactnumber']; ?></i>
      </div>
      <br>
      <div class="user">
        <b>Shop Name</b>:<i><?php echo $row1['country']; ?></i>
      </div>
     </div>
      </div>
    
    <?php
              $rows1=$rows1-1;
              }
                ?>
</body>
</html>