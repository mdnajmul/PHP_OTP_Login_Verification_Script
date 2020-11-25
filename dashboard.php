<?php

    session_start();

    if(!isset($_SESSION['IS_LOGIN'])){
        header('location:index.php');
        die();
    }else{
        echo 'Successfully Login. Welcome to Dashboard<br/>';
    }
  

?>

<a href="logout.php">Logout</a>


