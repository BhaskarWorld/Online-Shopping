<?php

     require 'includes/dbh_inc.php';
    require "bootstrap.php";
  
    if(!isset($_GET['ItemID'])){
        header("home.php");
    }
    else{
        $sql = "SELECT * FROM itemdetails WHERE ItemID=?";
        $stmt  = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../home.php?error=nosuchitem");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $_GET['ItemID']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
   
            if($row = mysqli_fetch_assoc($result)){
                $ItemName=$row["ItemName"];
                $ItemPrice=$row["ItemPrice"];
               $ItemRatings=$row["ItemRatings"];
                $ItemDiscount=$row["ItemDiscount"];
                $ItemDesc=$row["ItemDesc"];
                $ItemImage=$row["ItemImage"];
                $ItemCategory=$row["ItemCategory"];
                $ItemStars=$row["ItemStars"];
                $ItemQuantity=$row["ItemQuantity"];
                
            }


        }
    }
?>



	<div class="container margin">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-4">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img  src="<?php echo $ItemImage;?>" /></div>
						  
						</div>
						
						
					</div>
					<div class="details col-md-7">
						<h3 class="product-title"><?php
                            echo $ItemName;?></h3>
						<div class="rating">
							<div class="stars">
								<?php
                                
                                $stars = '';
                                 if( $ItemStars<=5){
                                 for($x=0; $x<$ItemStars;$x++){
                                     $stars .= '<span class="fa fa-star checked"></span>';

                                 }
                                for($y=5; $y>$x;$y--){
                                    $stars .= '<span class="fa fa-star "></span>';

                                 }

                                 }
                                
                                echo $stars;
                                
                                
                                
                                ?>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description"><?php
                            echo $ItemDesc;?></p>
						<h4 class="price">current price: <span>₹<?php
                            echo $ItemPrice;?></span></h4><?php if($ItemQuantity>0){echo '<p class="text-success "><strong>In Stock</strong></p>';}else{echo '<p class="text-danger">Out of Stock</p>';}?>
                        <p><strong>Discount:</strong>&nbsp;<span class="discount" ><?php
                            echo $ItemDiscount;?>%</span></p>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(<?php
                            echo $ItemRatings;?> ratings)</strong></p>

						<div class="action">
                            
                            <?php
                        
                                if(isset($_SESSION['CustomerName'])){
                                    
                                     if($ItemQuantity>0){echo '<a class="text-success" href="includes/order_inc.php?CusID='.$_SESSION['CustomerID'].'&ItemID='.$_GET['ItemID'].'"><button class="add-to-cart btn btn-default" type="button">Order</button></a>';}else{echo '';}
                                    
                                    echo '';
                                }
                                else{
                                    echo '<a href="Login.php"><button class="back btn btn-default btn-success" type="button">Sign In</button></a>';
                                    
                                    $_SESSION['ItemID'] = $_GET['ItemID'];
                                }
                            ?>
							
                            <a href="home.php"><button  class="btn btn-danger back" type="button">back</button></a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<style>
    .discount{
        color:green;
    }
    .margin{margin-bottom: 100px;}

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 300px;
      height: auto;
     
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .back {
 
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }
    
    .add-to-cart{ background: #ff9f1a;}

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

</style>