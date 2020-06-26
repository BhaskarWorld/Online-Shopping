<?php

if(isset($_POST['signin_submit'])){
    
    require 'dbh_inc.php';
    
    

    $emailid = $_POST['email'];

    $pass = $_POST['password'];
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    
    $sql = "SELECT * FROM userdetails WHERE EmailID=?  OR Phone=?";
    $stmt  = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../Login.php?error=sqlerror1");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "ss", $emailid,$emailid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
//        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($row = mysqli_fetch_assoc($result)){
            
            $passwordcheck = password_verify($pass, $row['Password']);
            echo($row['Password']);
            if(!$passwordcheck ){
                header("Location: ../Login.php?error=wrongpassword");
                exit();
                
            }
            else if($passwordcheck ){
                session_start();
                $_SESSION['CustomerName'] = $row['UserName'];
                $_SESSION['CustomerID'] = $row['UserID'];
                if(isset($_SESSION['ItemID'])){

                        
                        header("Location: ../home.php?page=itemdetails&ItemID=".$_SESSION['ItemID']);
                   unset($_SESSION['ItemID']);
                    
                    exit();
                    
                }else{
                header("Location: ../home.php");
                    exit();}
                
            }
            else{
                 header("Location: ../Login.php?error=somethingwronghappened");
                    exit();
                
            }
            
        }
        else{
            header("Location: ../Login.php?error=nouser");
            exit();
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    


else{
    header("Location: ../Login.php");
    exit();
}