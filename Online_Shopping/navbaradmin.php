<?php
    require "bootstrap.php";
    
    
?>



<nav class="navbar navbar-inverse">
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
   
    <div class="collapse navbar-collapse" id="btn-toggle">
        <ul class="nav navbar-nav navbar-right" style="margin-right:100px;">
           
            <li class="active "><a href="home.php"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
         
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