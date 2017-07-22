<?php

  require 'common.php';

  $email=$_POST['email'];
  $email_query = "SELECT userid FROM users WHERE email='$email'";
  $email_query_result = mysqli_query($con,$email_query);
  $email_rows = mysqli_num_rows($email_query_result);

  if($email_rows==0){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $password=MD5($_POST['password']);
    $contactnumber=$_POST['contactnumber'];
    $country=$_POST['country'];
    

    
    
    $users_registration_query="INSERT INTO users(firstname,lastname,email,password,contactnumber,country) values ('$firstname','$lastname','$email','$password','$contactnumber','$country')";

    $users_registration_submit=mysqli_query($con,$users_registration_query) or die (mysqli_error($con));
    $id=mysqli_insert_id($con);
    $_SESSION['email']=$email;
    $_SESSION['id']=$id;
    

      
      //echo "done";
      header('Location:login.php',true);
  }
  else{
    
    echo "<script type='text/javascript'> alert('This Account Already Exists!Please try with another email...');</script>";
    
    //header('Location:index.php',true);
  }
?>