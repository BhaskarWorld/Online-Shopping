<html>
    <head>
        <title>Sign In</title>
        <link rel="stylesheet" href="login.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>
    
    <body onload="firstfocus();">
<!--        <div class= "logo"><img src="logoo.png"></div>-->
        <div class ="main_container signup">
            <h1>Sign Up</h1>
            <form action="includes/Signup_inc.php" method="post" onSubmit="return validatesubmit()">
                <?php
                if(isset($_GET['error'])){
                if(($_GET["error"] =="usertaken")){
                    echo"<span id='submiterror'>EmailID or Phone Number already taken!</span>";
                }
                
                }
                if(isset($_GET['signup'])){
                    if(($_GET["signup"]=="success")){
                    echo"<span id='submiterror'>Signup Successfull!</span>";
                    
                }}
                ?>
                <span id="submiterror"></span>
                <div class="inputs  username">
                     <?php
                if(isset($_GET['Customer_Name'])){
                    $Name = $_GET['Customer_Name'];
                    echo'<input type="text" name="Customer_Name" placeholder=""  required  autocomplete="off" id="CustomerName"   onblur="validatename();" value="'.$Name.'">';
                }
                    else{
                       echo'<input type="text" name="Customer_Name" placeholder=""  required  autocomplete="off" id="CustomerName"   onblur="validatename();">';
                    }
                
                
                ?>      
<!--                    <input type="text" name="Customer_Name" placeholder=""  required  autocomplete="off" id="CustomerName"   onblur="validatename();">-->
                    <label for="Customer_Name">Name</label>
                    <span id="cnames"></span>
                </div>
                <div class="inputs email">
                          
                    <input type="text" name="email" placeholder=""  required  autocomplete="off"  id="EmailID"  onblur="validateemail()">
                    <label for="email">Email</label>
                    <span id="emails"></span>
                    
                </div>
                <div class="inputs username">
                          
                    <input type="text" name="phone" placeholder=""   required autocomplete="off" id="MobilePhone"  onblur="validatephone()">
                    <label for="phone">Mobile phone number</label>
                    <span id="phones"></span>
                </div>
                <div class="inputs password">
                    <input type="password" name="password" placeholder=""  required  autocomplete="off" id="Pass"  onblur="validatepass()">
                    <label for="password">Password</label>  
                    <span id="pass"></span>
                </div>
                 <div class="inputs cpassword">
                    <input type="password" name="cpassword" placeholder=""   required autocomplete="off" id="conPass"  onblur="validatecpass()">
                    <label for="password">Confirm Password</label>  
                     <span id="cpass"></span>
                </div>
                <div class=" submit">
                   <input type="submit" name="signup_submit" id="fsubmit">                
                </div>
                
                <div class="link">
                   
                    <p>Aleady have an account?<a href="Login.php" class="signup"><span>&nbsp;Sign In</span></a></p>
                
                </div>
            
            
            </form>
            
        </div>
        
    
    </body>
    
    <script>
        
        function firstfocus(){
            var uid = document.getElementById("CustomerName").focus();
            return true;
        }
        
        function validatename(){
           var cname = document.getElementById("CustomerName");
           var cname_len = cname.value.length;
           if(cname_len!=0){
               cname.classList.add("active");
           }
           else{
               cname.classList.remove("active");
           }
           
           
           if (cname_len == 0 || cname_len >= 26 || cname_len < 3)
           {
                document.getElementById("cnames").innerHTML="Name should not be empty / length be between 3 to 25 ";
                
                return false;
           }
           
           else if(!cname.value.match(/^[a-zA-Z ]+$/)){
               document.getElementById("cnames").innerHTML="Name should contain alphabets only ";
               return false;
           }
           else
               {
                   document.getElementById("cnames").innerHTML="";
                   document.getElementById("EmailID").focus();
                   return true;
               }
          
       }
        
        function validateemail(){
            var email = document.getElementById("EmailID");
            var email_len = email.value.length;
           if(email_len!=0){
               email.classList.add("active");
           }
           else{
               email.classList.remove("active");
           }
            
            if (email_len == 0 )
           {
                document.getElementById("emails").innerHTML="The field cannot be left empty!"
                
                return false;
           }
           
           else if(!email.value.match( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
               document.getElementById("emails").innerHTML="Enter a valid Email ID! ";
               return false;
           }
           else
               {
                   document.getElementById("emails").innerHTML="";
                   document.getElementById("MobilePhone").focus();
                   return true;
               }
          
       }
        
        function validatephone(){
            var phone = document.getElementById("MobilePhone");
            var phone_len = phone.value.length;
            if(phone_len!=0){
                phone.classList.add("active");
            }
            else{
                phone.classList.remove("active");
            }
            
            
            if ( phone_len!= 10)
            {
                document.getElementById("phones").innerHTML="Phone number should contain 10 digits ";
                
                return false;
            }
           
            else if(isNaN(phone.value)){
                document.getElementById("phones").innerHTML="Name should contain numbers only ";
                return false;
           }
           else{
               document.getElementById("phones").innerHTML="";
               document.getElementById("Pass").focus();
               return true;
           }
          
       }
        
        function validatepass(){
            var password = document.getElementById("Pass");
            var password_len = password.value.length;
            
            if(password_len!=0){
                password.classList.add("active");
            }
            else{
                password.classList.remove("active");
            }

            if(!password.value.match(/^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/)){
                document.getElementById("pass").innerHTML="Password should contain atleast 1 uppercase letter, 1 lowercase, 1 number, 1 special character/ LENGTH SHOULD BE GREATER THAN 7. ";
                return false;
            }
            else 
                {
                    document.getElementById("pass").innerHTML="";
                    document.getElementById("conPass").focus();
                    return true;
                }   
            
            }
        
        function validatecpass(){
            var password = document.getElementById("Pass");
            var cpassword = document.getElementById("conPass");
            var cpassword_len = cpassword.value.length;
            
            if(cpassword_len!=0){
                cpassword.classList.add("active");
            }
            else{
                cpassword.classList.remove("active");
            }

            if(password.value!=cpassword.value){
                document.getElementById("cpass").innerHTML="Password does not match";
                return false;
            }
            else
                {
                    document.getElementById("cpass").innerHTML="";
                    document.getElementById("fsubmit").focus();
                    return true;
                }   
            
            }
        function validatesubmit(){
//            alert(validatecpass()&&validatepass()&&validatephone()&&validatename()&&validateemail());
            var check = validatecpass()&&validatepass()&&validatephone()&&validatename()&&validateemail();
            if(!check){
                document.getElementById("submiterror").innerHTML="Please enter the details correctly";
    
               
            }
        
            
        
            return check;
    
        
            }
        
        
        
        
    </script>

</html>