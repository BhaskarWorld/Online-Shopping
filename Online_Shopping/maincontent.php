<div id="abcmain" class="carousel slide" data-ride="carousel" >
            
            <ol class="carousel-indicators">
                <li data-target="#abcmain" data-slide-to="0" class="active"></li>
                <li data-target="#abcmain" data-slide-to="1" ></li>
                <li data-target="#abcmain" data-slide-to="2" ></li>
                <li data-target="#abcmain" data-slide-to="3" ></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">                    
                    <img src="images/100.jpg"  >
                        <div class="carousel-caption">
                        <h1>Hello</h1>
                        <p>My name is bhaskarjyoti sarma1. </p>
                        </div>
                </div>
                
                
                <div class="item ">
                    <img src="images/101.jpg"  >
                        <div class="carousel-caption">
                            <h1>Hello</h1>
                            <p>    My name is bhaskarjyoti sarma2. </p>
                        </div>
                </div>
                
                
                <div class="item ">
                    <img src="images/102.jpg"  >
                        <div class="carousel-caption">
                        <h1>Hello</h1>
                        <p>My name is bhaskarjyoti sarma3. </p>
                        </div>
                </div>
                
                
                <div class="item ">
                    <img src="images/103.jpg"  >
                        <div class="carousel-caption">
                            <h1>Hello</h1>
                            <p>    My name is bhaskarjyoti sarma4. </p>
                    </div>
                </div>
            </div>
             <a href="#abcmain" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a href="#abcmain" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>

        
        </div>







<div style="width:40%; margin:60px auto 0 auto; "> <h1 style="text-align: center; color:darkorchid;">Men's Section</h1><hr> </div>


<?php
    require "productslidermen.php";?>

<div style="width:40%; margin:60px auto 0 auto; "> <h1 style="text-align: center; color:darkorchid;">Women's Section</h1><hr> </div>
<?php

require "productsliderwomen.php";?>

<div style="width:40%; margin:60px auto 0 auto; "> <h1 style="text-align: center; color:darkorchid;">Electronics</h1><hr> </div>
<?php
        require "productsliderelectronics.php";
        
?>





<style>
    .jumbotron{
        padding:0 px;
    }
    
    
    #abcmain{
        width:100%;
        height:500px;
        margin:0 auto;
        margin-top: 51px;
        
        
        
    }
    
    #abcmain img{
        height:500px;
        width: 100%;
            }
    


    
   
     @media screen and (max-width:1100px)
    {
        #abcmain{height: 350px;}
        #abcmain img{height:350px;} 
        
    }
     @media screen and (max-width:680px)
    {
        #abcmain{height: 250px;}
        #abcmain img{height:250px;} 
    }
    @media screen and (max-width:480px)
    {
        #abcmain{display: none;}
    }
    

    

</style>