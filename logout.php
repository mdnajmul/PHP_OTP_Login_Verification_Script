<?php

    session_start();

    if(isset($_SESSION['IS_LOGIN'])){
        unset($_SESSION['IS_LOGIN']);
        unset($_SESSION['EMAIL']);
        header('location:index.php');
        die();
    }

?>