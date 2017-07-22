<?php
include 'common.php';
include 'init.php';
if(isset($_POST['article_id'],$_SESSION['id']) && article_exists($_POST['article_id'])){
	$article_id=$_POST['article_id'];
	if(previously_liked($article_id)){
		echo 'You Have Already Liked This';
	}
	else{
		add_like($article_id);
		echo 'success';
	}
}
	
?>