<?php

    require 'dbh_inc.php';
    if(isset($_POST['searchItem'])){
        $ItemID = $_POST['searchid'];
       


        $sql = "SELECT * from ItemDetails where ItemID=?";
        $stmt  = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../Login.php?error=sqlerror1");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s",$ItemID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $num =mysqli_num_rows($result);
            
            if($num > 0){
                $row = mysqli_fetch_assoc($result);
                
                $ItemName = $row['ItemName'];
                $ItemPrice = $row['ItemPrice'];
                $ItemDiscount = $row['ItemDiscount'];
                $ItemRating = $row['ItemRatings'];
                $ItemDesc = $row['ItemDesc'];
                $ItemQuantity = $row['ItemQuantity'];
                
                
                header("Location: ../AdminPanel.php?success=itemfound&itemid=$ItemID&name=$ItemName&price=$ItemPrice&discount=$ItemDiscount&rating=$ItemRating&desc=$ItemDesc&quantity=$ItemQuantity");
                exit();
                
            }
            else{
                header('Location: ../AdminPanel.php?error=noitem');
                exit();
            }
        }
    }
    else if(isset($_POST['UpdateSubmit'])){
        
            $ItemID = $_POST['idu'];
            $ItemName = $_POST['nameu'];
            $ItemPrice = $_POST['priceu'];
            $ItemDiscount = $_POST['discountu'];
            $ItemRating = $_POST['ratingu'];
            $ItemStar = $_POST['staru'];
            $ItemCategory = $_POST['categoryu'];
            $ItemDesc = $_POST['descu'];
            $ItemQuantity = $_POST['quantityu'];
        
            if($ItemCategory == 'Men'){
                $ItemImage= 'images/item_images/m/'.$_POST['imgu'];
            }
            else if($ItemCategory == 'Women'){
                $ItemImage= 'images/item_images/w/'.$_POST['imgu'];
            }
            else if($ItemCategory == 'Electronics'){
                $ItemImage= 'images/item_images/e/'.$_POST['imgu'];
            }
           
        
        
            $sql = "UPDATE ItemDetails SET ItemName=?,ItemPrice=?,ItemDiscount=?,ItemRatings=?,ItemStars=?,ItemCategory=?,ItemDesc=?,ItemImage=?,ItemQuantity=? WHERE ItemID=?";
            $stmt  = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../Signup.php?error=update");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "ssssssssss", $ItemName , $ItemPrice , $ItemDiscount , $ItemRating , $ItemStar , $ItemCategory , $ItemDesc , $ItemImage , $ItemQuantity , $ItemID );
                mysqli_stmt_execute($stmt);
                
               
                header("Location: ../AdminPanel.php?success=update");
                exit();
                    
                
              
                    
            
            }


    }
else{
    header("Location: ../AdminPanel.php");
   exit();
}
?>