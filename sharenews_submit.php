<?php

  require 'common.php';
  $date=$_POST['date'];
  $place=$_POST['place'];
  $news=$_POST['news'];
  $subject=$_POST['subject'];
  $news_registration_query="INSERT INTO news(occur,place,news,userid,current,subject) VALUES ('$date','$place','$news','$_SESSION[id]',NOW(),'$subject')";
      $newss_registration_submit=mysqli_query($con,$news_registration_query) or die (mysqli_error($con));
            header('Location:sharenews.php',true);
?>

