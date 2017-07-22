<?php

  include 'common.php';
  $to=$_POST['to'];
  $mail=$_POST['mail'];
  $a=0;
  $send=$_SESSION['email'];
  $mail_registration_query="INSERT INTO mail(send,recieve,message,seen) values ('$send','$to','$mail','$a')";
//echo "your message has been sent";
  //echo "<script type='text/javascript'> alert('your message has been sent')</script>";
    $mail_registration_submit=mysqli_query($con,$mail_registration_query) or die (mysqli_error($con));
    //echo "<script type='text/javascript'> alert('your message has been sent')</script>";
    header('Location:sendmessage.php',true);
    //echo "your message has been sent";
    //echo "<script type='text/javascript'> alert('your message has been sent')</script>";
    ?>