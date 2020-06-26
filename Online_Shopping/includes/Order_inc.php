<?php
    $CustomerID = $_GET['CusID'];
    $ItemID = $_GET['ItemID'];

    require 'dbh_inc.php';
    
    date_default_timezone_set('Asia/Calcutta');
    $DateTime = date("d-m-Y").' '.date("h:i:sa");
    
    $sql = "INSERT INTO  orderdetails (ItemID,CustomerID,OrderDate) VALUES (?,?,?)";
    $stmt  = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../Login.php?error=sqlerror1");
        exit();
    }
    else if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, "sss", $ItemID,$CustomerID,$DateTime);
        mysqli_stmt_execute($stmt);
        header('Location: ../home.php?order=success');
        exit();
    }
    else{
        header('Location: ../home.php');
        exit();
    }
    mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
    
        
?>