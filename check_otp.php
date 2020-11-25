<?php

    session_start();

    $con=mysqli_connect('localhost','root','','userdata');

    $otp=$_POST['otp'];
    $email=$_SESSION['EMAIL'];

    $res=mysqli_query($con,"SELECT * FROM user WHERE email='$email' AND otp='$otp'");
    $count=mysqli_num_rows($res);
    if($count>0){
        
        mysqli_query($con,"UPDATE user SET otp='' WHERE email='$email'");
        $_SESSION['IS_LOGIN']='yes';
        echo 'exists';
        
    }else{
        echo 'not_exists';
    }

?>