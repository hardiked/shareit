<?php

require 'common.php';
include 'init.php';
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
  <script type="text/javascript" src="like.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  a:hover{
  	cursor:pointer;
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
        <li class="active dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Find<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="findnews.php">NEWS</a></li>
            <li><a href="#">Poem</a></li>
            
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
<?php
            $user1_query = "SELECT * FROM articles";
            $user1_result = mysqli_query($con,$user1_query);
            $rows1=mysqli_num_rows($user1_result);
            if($rows1==0){
            	echo "No poem yet shared let's start it";
            }
            else{
?>

<div class="container">
<?php
            while($rows1>0){
            $row1=mysqli_fetch_array($user1_result);
            $userid=$row1['userid'];
            $user12_query="SELECT * FROM users WHERE userid='$userid'";
            $user1_result1 = mysqli_query($con,$user12_query);
            $row12=mysqli_fetch_array($user1_result1);
            $u=$row1['articleid'];
?>

<?php ?>
	<div class="title" style="background-color: greenyellow; width:50%;margin-left: 20%;margin-top: 7%;">
		<h2 class="title" style="margin-left: 30%;"><?php echo $row1['article_title']; ?></h2>
	</div>
	<div class="poem" style="margin-left: 20%;background-color:white;width:50%;margin-top: -0.9%;min-height:100px;font-size: 120%;padding-left: 5%;padding-top:1%;border:1px solid black;padding-right:5%;">
		<?php echo $row1['article_content']; ?>
		
	</div>
	<div class="like">
		<i class="fa fa-thumbs-o-up" style="font-size: 150%;margin-left: 23%;margin-top: 1%;"></i>
		<div class="reallike" style="margin-left: 25%;margin-top: -1.9%;font-size: 120%;"><a onclick="like_add('<?php echo $u;?>');">Like</a><span id="article_<?php echo $u; ?>_likes"><?php echo $row1['article_like']; ?></span>like this</div>
		<div class="author" style="margin-left: 60%;margin-top: -1.5%;"><?php echo $row12['firstname']."  ".$row12['lastname'];?><br><?php echo $row1['current']; ?></div>
	</div>
	<?php $rows1=$rows1-1;}} ?>
</div>

</body>
</html>