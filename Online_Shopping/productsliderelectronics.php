<?php
require "bootstrap.php";
require "includes/dbh_inc.php";


function make_query2($conn)
{
    $sql = "SELECT * FROM itemdetails where ItemCategory=?";
    $stmt  = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo mysqli_error();
//        header("Location: productslider.php?error=sqlerror1");
//        exit();
    }
    else{
        $category ='Electronics';
        mysqli_stmt_bind_param($stmt, "s", $category);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
//        echo $result;
        $resultCheck = mysqli_num_rows($result);
        return $result;
    }
}
function make_slide_indicators2($conn)
{
     $output = ''; 
     $count = 0;
    $subcount = 0;
     $result = make_query2($conn);
     while($row = mysqli_fetch_array($result))
     {
         if($count == 0)
         {
             $output .= '<li data-target="#abcelectronics" data-slide-to="'.$count.'" class="active"></li>';
         }
         else if(($count%6 == 0) && $count != 0)
         {
             $subcount = $subcount+1;
             $output .= '<li data-target="#abcelectronics" data-slide-to="'.$subcount.'"></li>';
         }
         $count = $count + 1;
     }
     return $output;
}


function make_slides2($conn)
{   $stars = '';
     $output = ''; 
     $subcount = 0;
     $result = make_query2($conn);
     while($row = mysqli_fetch_array($result))
     {
        if($subcount == 0)
        {
            $output .= '<div class="item active">
                        <div class="row">';
        }
         else if(($subcount%6 == 0) && $subcount != 0)
         {
             $output .= '</div></div><div class="item ">
                        <div class="row">';
         }
//         star calculation
         $stars = '';
         if($row['ItemStars']<=5){
             for($x=0; $x<$row['ItemStars'];$x++){
                 $stars .= '<i class="fa fa-star check"></i>';

             }
            for($y=5; $y>$x;$y--){
                $stars .= '<i class=" fa fa-star ncheck"></i>';

             }
        
         }
         //         star calculation
         
         $output .= '<div class="col-xs-6 col-md-2">
                                <div class="product_item">
                                    <div class="product_photo">
                                        <a href="home.php?page=itemdetails&ItemID='.$row['ItemID'].'"><img src="'.$row['ItemImage'].'" class="img-responsive" alt="a" /></a>
                                    </div>
                                    <div class="product_info" style="background-color: #555;">
                                        <div class="product_title">
                                            <h4><p>'.$row['ItemName'].' </p></h4></div>
                                        <div class="product_rating">
                                            '.$stars.'<br>
                                            <p>('.$row['ItemRatings'].' ratings)</p>
                                        </div>
                                        <div class="hline"></div>
                                        <div class="product_price text-success text-bold">
                                            ₹ '.$row['ItemPrice'].' ('.$row['ItemDiscount'].'% off)
                                        </div>
                                    </div>
                                </div>
                            </div>';
         
         $subcount = $subcount + 1;
     }
     return $output;
}
?>
            
  <link rel='stylesheet' type="text/css" href="productstyle.css">          
  
<div class="product_slider electronics">
        <div class="container-fluid">          
            <div id="abcelectronics" class="carousel slide" data-ride="carousel" >
                <ol class="carousel-indicators">
                    <?php echo make_slide_indicators2($conn); ?>
                </ol>
                <div class="carousel-inner">
                    <?php echo make_slides2($conn); 
                    mysqli_close($conn);?>
                </div>
            </div>
            <a class="left carousel-control" href="#abcelectronics" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#abcelectronics" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
</div>
</div>
</div>


            
                
                
                
                
                    


    

    