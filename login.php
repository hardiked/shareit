<?php

require 'common.php';
if(isset($_SESSION['email'])){
    //header('loacation:products.php');
    echo "Some one is already loged in.";
}

?>

<html>
<head>
	<title>login page</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</head>
<body>
<div class="container c" style="margin-top:5%;margin-left:33%;width:40%;">
<div style="background-color: turquoise;border-top-left-radius: 5px;border-top-right-radius: 5px;  ">
    <div class="container" style="margin-top:10%;margin-left:25%;width:45%;">
    	<ul class="nav nav-tabs" role="tablist" style="color:red;">
    		<li><a href="signup.php" data-toggle="tooltip" title="Create account here!">SIGN UP</a></li>
   		    <li class="active" style="border-bottom: 3px solid blue;"><a href="#">LOG IN</a></li>       
  		</ul></div>
  		<div class="panel panel-primary" style="margin-top:0%;">
  		<div class="panel-body">
                            <form method="post" action="login_submit.php">
                                <input type="text" class="form-control form-group input-lg" placeholder="Email" name="email" required>
                                <input type="password" class="form-control form-group input-lg" placeholder="Password" name="password" required>
                                <input type="Submit" class="btn btn-primary" value="Submit">
                            </form>
                        </div>
                        </div>
    </div>
    </div>

</body>
</html>