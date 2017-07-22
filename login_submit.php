<?php

    require 'common.php';



    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=md5($_POST['password']);

    $users_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $users_result = mysqli_query($con,$users_query);
    $num_rows=mysqli_num_rows($users_result) or die(mysqli_error($con));
    

    if($num_rows == 0){
       header('Location:login.php');
    }
    else{
        
        $row=mysqli_fetch_array($users_result);
        $_SESSION['email']=$row['email'];
        $_SESSION['id']=$row['userid'];
        $_SESSION['firstname']=$row['firstname'];
        $_SESSION['lastname']=$row['lastname'];
        $_SESSION['contactnumber']=$row['contactnumber'];
        $_SESSION['country']=$row['country'];
        $_SESSION['image']=$row['image'];
        
       
        $nid=$row['userid'];
        
        header('Location:home.php');
        
    }

?>

