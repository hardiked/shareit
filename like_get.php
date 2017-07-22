<?php
    include 'common.php';
	include 'like.php';
	if(isset($_POST['article_id'],$_SESSION['id']) && article_exists($_POST['article_id'])){
		echo like_count($_POST['article_id']);
	}
?>