<?php 
	include 'common.php';
	include 'init.php';
	$user_id = $_GET['user_id'];
	$email=$_SESSION['email'];
    $profiles_query = "SELECT * FROM users WHERE email='$email'";
    $profiles_result = mysqli_query($con,$profiles_query);
    $profile=mysqli_fetch_array($profiles_result);
	$profile_query = "SELECT * FROM users WHERE userid='$user_id'";
    $profile_result = mysqli_query($con,$profile_query);
    $row=mysqli_fetch_array($profile_result);
    $poem_query = "SELECT * FROM articles WHERE userid='$user_id'";
    $poem_result = mysqli_query($con,$poem_query);
    $rows1=mysqli_num_rows($poem_result);
    $q=$row['userid'];


    $follower_count_query = "SELECT * FROM followers WHERE followingid='$q'";
    $follower_query_result = mysqli_query($con,$follower_count_query);
    $follower_rows = mysqli_num_rows($follower_query_result);

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Page:<?php echo $row['firstname']; ?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="like.js"></script>
    <style type="text/css">
    	a:hover{
    		cursor: pointer;
    	}
    </style>
</head>
<body>
<nav class="navbar navbar-inverse" style="width: 100%;">
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
<div class="contain" style="margin-left: 4%;">
<?php
         if($profile['image'] == ""){
            echo "<img width='200px' height='200px' src='pictures/profile.png' alt='Default Profile Pic' style='width:130px;height:130px;float:left;margin-top:5%;border-radius: 50%;'>";
            } else {
            echo "<img width='50px' height='50px' src='pictures/".$profile['image']."' alt='Profile Pic' style='width:130px;height:130px;float:left;margin-top:5%;border-radius: 50%;'>";
            }
    ?>
</div>

<div class="container" style="margin-top: 6%;width:1091px;margin-left: 20%;font-size: 185%;font-family: Robota;color: black;border-bottom: 1px solid black;">
	<div class="info">
	Name:<?php echo $row['firstname'];echo "  "; echo $row['lastname']; ?>
	</div>
	<div class="info">
	Email-ID:<?php echo $row['email']; ?>
	</div>
	<div class="info">
	Contact Number:<?php echo $row['contactnumber']; ?>
	</div>
	<div class="info">
	Country:<?php echo $row['country']; ?>
	</div>
</div>

<div class="follow" style="margin-top: 3%;margin-left: 6%;border:1px solid black;width:6%;padding:2px;border-radius: 10%;background-color: blue;color:white;">
	<a onclick="users('<?php echo $q;?>');" style="color:white;">FOLLOW</a>
</div>
  
<div class="number" style="margin-left: 12%;margin-top: -1.85%;border-right:1px solid black;background-color: blue;color: white;width:2%;border-radius: 10%;padding:2px;">
<?php echo $follower_rows; ?>
</div>
<?php
            $follower_query = "SELECT * FROM followers WHERE followingid='$q'";
            $follower_result = mysqli_query($con,$follower_query);
            $rows12=mysqli_num_rows($follower_result);
            ?>

    <?php
                while($rows12>0){
                  $row12=mysqli_fetch_array($follower_result);
                  ?>
<div class="followers" style="float: left;margin-left: 5%;margin-top: 1%;display:inline-grid;">
	<?php echo $row12['followername']; ?>,<?php $rows12=$rows12-1;} ?>
</div>

<div class="container" style="margin-top: -20%;margin-left: 209%;width:0%;font-size: 250%;font-family: Arial;color:red;">
	Contributions
</div>
<div class="poems">

<?php
        while($rows1>0){
            $row12=mysqli_fetch_array($poem_result);
    ?>
    <div class="title" style="margin-left:55%;font-size: 200%;font-family: Roboto;color:mediumspringgreen;">
    	<?php echo $row12['article_title']; ?>
    </div>
    <div class="poem" style="margin-left: 50%;">
    	<?php echo $row12['article_content']; ?>
    </div>
    <div class="likecount" style="margin-left: 50%;border-bottom: 1px solid black;width:200px;margin-bottom: 2%;">
    	<?php echo $row12['article_like']; ?>  Likes
    </div>
    <?php $rows1=$rows1-1;} ?>
</div>
</body>
</html>