<?php
    session_start();
    if(isset($_SESSION['AdminLogin'])){
    unset($_SESSION['AdminLogin']);
    header('Location: ../AdminLogin.php');
    exit();
    }
    else{
        header('Location: ../AdminPanel.php');
        exit();
    }
?>