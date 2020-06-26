<?php
session_start();
if(isset($_SESSION['AdminLogin'])&&$_SESSION['AdminLogin']=='success'){
    header('Location: AdminPanel.php');
    exit();}
?>

<html>
    <head>
        <title>Admin Sign In</title>
        <link rel="stylesheet" href="login.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>
    
    <body onload="firstfocus()">
<!--        <div class= "logo"><img src="logoo.png"></div>-->
        <div class ="main_container">
            <h1>Login</h1>
           <form action="includes/AdminLogin_inc.php" method="post" onsubmit="return validatesubmit()"  autocomplete="off">
                <div class="inputs username">
                
                          
                    <input type="text" name="email" placeholder="" value="" required autocomplete="false" id="emailorphn"  onblur="validateemail()">
                    <label for="Username">Admin Username</label>
                    <span id="emailsorphns"></span>
                </div>
                <div class="inputs password">
                    <input type="password" name="password" placeholder="" value="" required autocomplete="false" id="Password"   onblur="validatepass()">
                    <label for="password">Password</label>  
                    <span id="passwords"></span>
                </div>
                <div class=" submit">
                   <input type="submit" id="fsubmit" name="signin_submit">                
                </div>
                    <?php
                if(isset($_GET['error'])){
                if(($_GET["error"] =="fillincomplete")){
                    echo"<p id='submiterror'>Username or Phone Number not filled!</p>";
                }
                   
                   else if(($_GET["error"]=="wrongpassword")){
                    echo"<p id='submiterror' >Wrong Username or Phone !</p>";
                    
                }
                
                }
                ?>
                
            
            
            </form>
            
        </div>
        
    
    </body>
    
    <style>
        .submiterror{margin-top: 50px;}
    
    </style>
    
    
    <script>
        
        function firstfocus(){
            var uid = document.getElementById("emailorphn").focus();
            document.getElementById("emailorphn").value="";
            document.getElementById("Password").value="";
            return true;
        }
        
       
        
        function validateemail(){
            var email = document.getElementById("emailorphn");
            var email_len = email.value.length;
           if(email_len!=0){
               email.classList.add("active");
               document.getElementById("emailsorphns").innerHTML="";
               document.getElementById("Password").focus();
               return true;
           }
           else{
               email.classList.remove("active");
               document.getElementById("emailsorphns").innerHTML="Enter your email or mobile number!";
                return false;
           }
            
            
       }
        
        function validatepass(){
            var password = document.getElementById("Password");
            var password_len = password.value.length;
           if(password_len!=0){
               password.classList.add("active");
               document.getElementById("passwords").innerHTML="";
               document.getElementById("fsubmit").focus();
               return true;
           }
           else{
               password.classList.remove("active");
               document.getElementById("passwords").innerHTML="Enter your Password!";
               return false;
           }
            
            
       }
      
        function validatesubmit(){
            if(validateemail()&&validatepass()){
                return true;
            }
            else{
                return false;
            }
        }
            
        
        
        
        
        
    </script>

</html>