<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php
   session_start();


    require 'bootstrap.php';
    require 'navbar.php';
    if(isset($_SESSION['CustomerID'])){?>
<div class="container" >
  <h2 style="margin-top:80px; margin-bottom:50px; ">Your Orders</h2>
<?php
        require 'includes/dbh_inc.php';
        $CustomerID = $_SESSION['CustomerID'];
        $CustomerName = $_SESSION['CustomerName'];


        $sql = "SELECT * from OrderDetails where CustomerID=?";
        $stmt  = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../Login.php?error=sqlerror1");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s",$CustomerID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $num =mysqli_num_rows($result);
            
            if($num > 0){
            while($row = mysqli_fetch_assoc($result)){
                $OrderID = $row['OrderID']; 
                $OrderDate = $row['OrderDate'];
                $ItemID = $row['ItemID'];



                $sql1 = "SELECT * from ItemDetails where ItemID=?";
                $stmt1  = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt1, $sql1)){
                    header("Location: ../Login.php?error=sqlerror1");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt1, "s",$ItemID);
                    mysqli_stmt_execute($stmt1);
                    $result1 = mysqli_stmt_get_result($stmt1);

                    $Itemrow = mysqli_fetch_assoc($result1);


                    $ItemName = $Itemrow['ItemName'];
                    $ItemRatings = $Itemrow['ItemRatings'];
                    $ItemStars = $Itemrow['ItemStars'];
                    $ItemImage = $Itemrow['ItemImage'];
                    $ItemPrice = $Itemrow['ItemPrice'];
                    $ItemDesc = $Itemrow['ItemDesc'];

                    $stars = '';
                     if($ItemStars<=5){
                         for($x=0; $x<$ItemStars;$x++){
                             $stars .= '<i class="fa fa-star check"></i>';

                         }
                        for($y=5; $y>$x;$y--){
                            $stars .= '<i class=" fa fa-star ncheck"></i>';

                         }

                     }

                    echo '<div class="panel panel-default" >
                            <div class="panel-heading">
                                        <div  class="col-md-3 text-muted">Order Placed<br>'.$OrderDate.'</div>
                                        <div class="col-md-3 text-muted">Total<br>₹'.$ItemPrice.'</div>

                                        <div class="col-md-3 text-muted">Ship To<br>'.$CustomerName.'</div>

                                        <div class="col-md-3 text-muted ">OrderID: #'.$OrderID.'</div>.

                              </div>
                            <div class="panel-body">
                                <div  class="col-md-3 "><img class="img-responsive" src="'.$ItemImage.'" style="width: 150px; height:170px;"/></div>
                                <div class="col-md-3 "><h3 class="text-primary">'.$ItemName.'</h3><p >'.$stars.'</p><p class="text-warning">Ratings:'.$ItemRatings.'</p><h4>Price:$'.$ItemPrice.'</h4></div>

                                <div class="col-md-6 text-muted ">'.$ItemDesc.'</div>



                            </div>
                          </div>';



                }
  
            }echo '</div>';
        }
            else {
                echo '<h3 class="text-warning">No Order Yet!</h3>';
                
            }
    }
}
else{
    header('Location: Login.php');
    exit();
}
    

require 'footer.php';




?>
</div>

<style>
    .check{color: orangered;}
    .ncheck{color:darkgrey;}

</style>



