<?php
session_start();
require "bootstrap.php";
require "navbar.php";


if(isset($_GET['order']) && $_GET['order'] == 'success'){
    echo '<p class="flash " id="fade">Order Successfull!</p>';
}
if(!isset($_GET['page'])){
require "maincontent.php";
}
else if(isset($_GET['page'])){
    require $_GET['page'].'.php';
}



require "footer.php";
?>

<style>
    .flash{
        position: fixed;
        top: 15%;
        left: 50%;
        transform: translate(-50%,-15%);
        background-color: rgba(208,240,190,.5);
        color:green;
        border: solid 1px darkgreen;
        border-radius: 5px;
        padding:5px 30px;
        z-index:100;
    }

</style>

<script>$('#fade').delay(1500).fadeIn('normal', function() {
      $(this).delay(1500).fadeOut();
   });</script>