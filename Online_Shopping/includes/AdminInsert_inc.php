<?php
session_start();
    if(isset($_SESSION['AdminLogin'])&&$_SESSION['AdminLogin']=='success'){
    require "dbh_inc.php";
        if(isset($_POST['InsertSubmit'])){
            $ItemID = $_POST['id'];
            $ItemName = $_POST['name'];
            $ItemPrice = $_POST['price'];
            $ItemDiscount = $_POST['discount'];
            $ItemRating = $_POST['rating'];
            $ItemStar = $_POST['star'];
            $ItemCategory = $_POST['category'];
            
            $ItemDesc = $_POST['desc'];
            $ItemQuantity = $_POST['quantity'];
            if($ItemCategory == 'Men'){
                $ItemImage= 'images/item_images/m/'.$_POST['img'];
            }
            else if($ItemCategory == 'Women'){
                $ItemImage= 'images/item_images/w/'.$_POST['img'];
            }
            else if($ItemCategory == 'Electronics'){
                $ItemImage= 'images/item_images/e/'.$_POST['img'];
            }
     
            
    $sql = "SELECT * FROM itemdetails WHERE ItemID=?";
    $stmt  = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../Signup.php?error=sqlerror1");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $ItemID );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
            header("Location: ../AdminPanel.php?error=itemIDexist&name=$ItemName&price=$ItemPrice&discount=$ItemDiscount&rating=$ItemRating&desc=$ItemDesc&quantity=$ItemQuantity");
            exit(); 
            
        }
        else{
            $sql1 = "INSERT INTO itemdetails (ItemID,ItemName,ItemPrice,ItemDiscount,ItemRatings,ItemStars,ItemCategory,ItemDesc,ItemImage,ItemQuantity) VALUES (?, ?, ?, ?,?, ?, ?, ?,?,?)";
            $stmt1  = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt1, $sql1)){
                header("Location: ../Signup.php?error=sqlerror2");
                exit();
            }
            else{
               
                mysqli_stmt_bind_param($stmt1, "ssssssssss",$ItemID, $ItemName, $ItemPrice, $ItemDiscount,$ItemRating,$ItemStar,$ItemCategory,$ItemDesc,$ItemImage,$ItemQuantity);
                mysqli_stmt_execute($stmt1);
                header("Location: ../AdminPanel.php?insert=success");
                exit(); 
            }
        }
        
        
    }
            mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt1);
    mysqli_close($conn);
}

else{
    header("Location: ../AdminPanel.php");
    exit();
}

}
else{
    header("Location: ../AdminLogin.php");
    exit();}
        
    
    
    
    
?>