<?php

  require 'common.php';
  $title=$_POST['poemtitle'];
  $poem=$_POST['poem'];
  $articles_registration_query="INSERT INTO articles(userid,article_title,article_content,current) VALUES ('$_SESSION[id]','$title','$poem',NOW())";
      $articles_registration_submit=mysqli_query($con,$articles_registration_query) or die (mysqli_error($con));
            header('Location:share.php',true);
?>

