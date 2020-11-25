<?php

    session_start();

    $con=mysqli_connect('localhost','root','','userdata');

    $email=$_POST['email'];

    $res=mysqli_query($con,"SELECT * FROM user WHERE email='$email'");
    $count=mysqli_num_rows($res);
    if($count>0){
        $otp=rand(11111,99999);
        mysqli_query($con,"UPDATE user SET otp='$otp' WHERE email='$email'");
        $html='<p>Your OTP verification code is: '.$otp.'</p>';
        $subject='OTP Verification';
        $_SESSION['EMAIL']=$email;
        
        include('smtp/class.phpmailer.php');
        $mail = new PHPMailer(); 
        $mail->IsSMTP(); 
        $mail->SMTPDebug = 1; 
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; 
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Username = "neberhossain7@gmail.com";
        $mail->Password = "01823260474";
        $mail->SetFrom("neberhossain7@gmail.com");
        $mail->Subject = $subject;
        $mail->Body =$html;
        $mail->AddAddress($email);
        if($mail->Send()){
            //echo 'yes';
        }else{
            //echo 'no';
        }
        
        
        echo 'exists';
        
    }else{
        echo 'not_exists';
    }

?>