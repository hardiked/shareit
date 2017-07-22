<?php
    

	function article_exists($article_id){
		$can=mysqli_connect("localhost","root","","share")  or die(mysqli_error($con));
		$article_query = "SELECT articleid FROM articles WHERE articleid='$article_id'";
        $article_query_result = mysqli_query($can,$article_query);
        $article_rows = mysqli_num_rows($article_query_result);
        if($article_rows==0)
            {
  				return false;
  			}
  		else
  			{
  				return true;
  			}
	}
	function previously_liked($article_id){
		$can=mysqli_connect("localhost","root","","share")  or die(mysqli_error($con));
		$like_query = "SELECT like_id FROM likes WHERE articleid='$article_id'AND userid='$_SESSION[id]'";
		$like_query_result = mysqli_query($can,$like_query);
		$like_rows = mysqli_num_rows($like_query_result);
		if($like_rows==0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function like_count($article_id){
		$can=mysqli_connect("localhost","root","","share")  or die(mysqli_error($con));
		$like_query = "SELECT article_like FROM articles WHERE articleid='$article_id'";
        $like_query_result = mysqli_query($can,$like_query);
        $like=mysqli_fetch_array($like_query_result);
        return $like['article_like'];
	}
	function add_like($article_id){
		$can=mysqli_connect("localhost","root","","share")  or die(mysqli_error($con));
		mysqli_query($can,"UPDATE articles SET article_like=article_like+1 WHERE articleid=$article_id");
		mysqli_query($can,"INSERT INTO likes (userid,articleid) VALUES ('$_SESSION[id]','$article_id')");
	}
	function previouslyfollowed($userid){
		$can=mysqli_connect("localhost","root","","share")  or die(mysqli_error($con));
		$profile_query="SELECT * FROM followers WHERE followerid='$_SESSION[id]'";
		$profile_query_result = mysqli_query($can,$profile_query);
		$profile_rows = mysqli_num_rows($profile_query_result);
		if($profile_rows==0)
		{
			return false;
		}
		else
		{
			return true;
		}

	}
	function add_followers($userid){
		$can=mysqli_connect("localhost","root","","share")  or die(mysqli_error($con));
		mysqli_query($can,"INSERT INTO followers (followerid,followingid) VALUES ('$_SESSION[id]','$userid')");
	}
?>