<?php

if(isset($_POST['signup_submit'])){
    
    require 'dbh_inc.php';
    
    
    $username = $_POST['Customer_Name'];
    $emailid = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];

    
    $sql = "SELECT * FROM userdetails WHERE EmailID=? OR Phone=?";
    $stmt  = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../Signup.php?error=sqlerror1");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "ss", $emailid, $phone);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
            header("Location: ../Signup.php?error=usertaken&Customer_Name=".$username);
            exit(); 
            
        }
        else{
            $sql = "INSERT INTO userdetails (UserName, Password, Phone, EmailID) VALUES (?, ?, ?, ?)";
            $stmt  = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../Signup.php?error=sqlerror2");
                exit();
            }
            else{
                $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ssss",$username, $hashedPassword, $phone, $emailid);
                mysqli_stmt_execute($stmt);
                header("Location: ../Signup.php?signup=success");
                exit(); 
            }
        }
        
        
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else{
    header("Location: ../Signup.php");
    exit();
}