<?php
include 'common.php';
if(isset($_POST['user_id'])){
	    $user_id=$_POST['user_id'];
	    $firstname=$_SESSION['firstname'];
		$email_query = "SELECT * FROM followers WHERE followerid='$_SESSION[id]' AND followingid='$user_id'";
        $email_query_result = mysqli_query($con,$email_query);
        $email_rows = mysqli_num_rows($email_query_result);
		echo $email_rows;
		if($email_rows==0){
			$users_registration_query="INSERT INTO followers(followerid,followingid,followername) values ('$_SESSION[id]','$user_id','$firstname')";
            $users_registration_submit=mysqli_query($con,$users_registration_query) or die (mysqli_error($con));
            echo "liked";
		}
		else{
			echo "you have already liked";
		}
	}
	else{
		echo "hi";
	}

?>