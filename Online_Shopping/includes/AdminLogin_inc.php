<?php

    if(isset($_POST['email'])&&isset($_POST['password'])){
    $username = $_POST['email'];

    $pass = $_POST['password'];
    
    if($username=='admin' && $pass=='admin'){
        session_start();
        $_SESSION['AdminLogin']='success';
        header('Location: ../AdminPanel.php');
        exit();
    }
    else{
        header('Location: ../AdminLogin.php?error=wrongpassword');
        exit();
    }
        
}
else{
     header('Location: ../AdminLogin.php?error=fillincomplete');
        exit();
}
?>