<?php


session_start();
if(isset($_SESSION['CustomerID'])){
    header('Location: home.php');
    exit();}

?>

<html>
    <head>
        <title>Sign In</title>
        <link rel="stylesheet" href="login.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>
    
    <body onload="firstfocus()">
<!--        <div class= "logo"><img src="logoo.png"></div>-->
        <div class ="main_container">
            <h1>Login</h1>
            <form action="includes/Login_inc.php" method="post" onsubmit="return validatesubmit()" >
                <div class="inputs username">
                          
                    <input type="text" name="email" placeholder="" required autocomplete="off" id="emailorphn"  onblur="validateemail()">
                    <label for="Username">Email or mobile phone number</label>
                    <span id="emailsorphns"></span>
                </div>
                <div class="inputs password">
                    <input type="password" name="password" placeholder="" required autocomplete="off" id="Password"   onblur="validatepass()">
                    <label for="password">Password</label>  
                    <span id="passwords"></span>
                </div>
                <div class=" submit">
                   <input type="submit" id="fsubmit" name="signin_submit">                
                </div>
                
                <div class="link">
                    <p><a href="#" class="fpass">Forgot password?</a></p>
                    <p>Did not register?<a href="Signup.php" class="signup"><span>&nbsp;Sign Up</span></a></p>.
                
                </div>
            
            
            </form>
            
        </div>
        
    
    </body>
    
    
    <script>
        
        function firstfocus(){
            var uid = document.getElementById("emailorphn").focus();
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