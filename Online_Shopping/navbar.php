<?php
    require "bootstrap.php";
    
    
?>



<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <img class="img-responsive img-circle" width=25 height=25 src="images/logo.gif">
        </a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#btn-toggle">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        
        </button>
    </div>
    <?php
                        if(isset($_SESSION['CustomerName'])){
                           echo '<p style="float:left; margin-left:100px; margin-top:15px; color:white;">Welcome '.$_SESSION['CustomerName'].'</p>';
                        }?>
    <div class="collapse navbar-collapse" id="btn-toggle">
        <ul class="nav  navbar-nav navbar-right" style="margin-right:100px;">
           
            <li class="active "><a href="home.php"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user"></i> Account<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                        if(isset($_SESSION['CustomerName'])){
                           echo '<li><a href="includes/Logout_inc.php">Logout</a></li>';
                        }
                        else{
                            echo '<li><a href="Login.php">Login</a></li>';
                            echo '<li><a href="Signup.php">Signup</a></li>';
                        }
                    
                    ?>
                    
                </ul>
            </li>
            <li class="dropdown"><a  href="OrderList.php"><i class="fas fa-shopping-bag"></i>  Orders</a></li>
            <li class="dropdown"><a  href="#"><span class="glyphicon glyphicon-earphone"></span>  Contact</a></li>
            <li class="dropdown"><a  href="aboutus.php"><span class="glyphicon glyphicon-globe"></span>  About</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user"></i> Admin<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                        if(isset($_SESSION['AdminLogin'])&&$_SESSION['AdminLogin']=="success"){
                           echo '<li><a href="includes/AdminLogout_inc.php">Logout</a></li>';
                        }
                        else{
                            echo '<li><a href="AdminLogin.php">Login</a></li>';
                           
                        }
                    
                    ?>
                    
                </ul>
            </li>
        </ul>
    </div>
</nav>

<style>

.navbar{
        position: fixed;
        z-index: 1;
        width: 100%;
        top:0;
        clear: both;
/*        background-color: aqua;*/
    }
    
</style>