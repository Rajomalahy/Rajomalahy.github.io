<?php
    session_start();
    
    if(isset($_SESSION["level"])){
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
    else{
        header("Location: login.php");
    }
?>