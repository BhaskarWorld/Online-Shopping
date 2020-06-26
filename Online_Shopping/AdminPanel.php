



<?php require "bootstrap.php";
session_start();


echo '<html>
    <head><title>Admin Panel</title></head>
    
    <body >';
       require "navbaradmin.php";
if(isset($_SESSION['AdminLogin'])&&$_SESSION['AdminLogin']=='success')  {
      echo '  <div class="container" style="margin: 51px auto ;">';
            if(isset($_GET['insert']) && $_GET['insert'] == 'success'){
                echo '<p class="flash success" id="fadeback">Insert Successfull!</p>';
            }
            if(isset($_GET['error']) && $_GET['error'] == 'update'){
                echo '<p class="flash danger" id="fadeback">Update Failed!</p>';
            }
            if(isset($_GET['success']) && $_GET['success'] == 'update'){
                echo '<p class="flash success" id="fadeback">Update Successfull!</p>';
            }
            
            if(isset($_GET['error']) && $_GET['error'] == 'noitem'){
                echo '<p class="flash danger" id="fadeback">Item Not found!</p>';
            }
            
            
            if(isset($_GET['error']) && $_GET['error'] == 'itemIDexist'){
                echo '<p class="flash danger" id="fadeback">Item ID already exists<br>please try unique ID</p>';
                $ItemDesc = $_GET['desc'];
                $ItemName = $_GET['name'];
                $ItemPrice = $_GET['price'];
                $ItemDiscount = $_GET['discount'];
                $ItemRating = $_GET['rating'];
                $ItemStar = $_GET['star'];
                $ItemCategory = $_GET['category'];
                $ItemImage = $_GET['img'];
                $ItemQuantity = $_GET['quantity'];
            }
        
            
            else{
                $ItemDesc = '';
                $ItemName = '';
                $ItemPrice = '';
                $ItemDiscount = '';
                $ItemRating = '';
                $ItemStar = '';
                $ItemCategory = '';
                $ItemImage = '';
                $ItemQuantity = '';
                
            }
            
            
            
           
     
        echo '<p class="flash nodisp danger" id="fade"></p>
        
            <div class="col-md-6" style="padding: 0 50px;">
                <h2 class="text-center text-primary">Insert Item</h2>
                
                
                
                <form id="insertsubmiterror" action="includes/AdminInsert_inc.php" onSubmit="return validatesubmit();" method="post">
                    <div class="form-group  ">
                        <label for="exampleFormControlInput1 ">Item ID</label>
                        <input name="id" type="text" onblur=" validateid() " class="form-control " required id="exampleFormControlInput1" >
                    </div>
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">Item Name</label>
                        <input type="text" name="name" class="form-control "  required id="exampleFormControlInput2" value="'.$ItemName.'">
                    </div>
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">Item Price</label>
                        <input type="text" name="price" onblur=" validateprice() " class="form-control " required id="exampleFormControlInput3" value="'.$ItemPrice.'" >
                    </div>
                     <div class="form-group  ">
                        <label for="exampleFormControlInput1 ">Item Quantity</label>
                        <input type="text" name="quantity" onblur=" validatequantity() " class="form-control " required id="exampleFormControlInput4" value="'.$ItemQuantity.'">
                    </div>
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">Item Discount</label>
                        <input type="text" name="discount" onblur=" validatediscount() " class="form-control " required id="exampleFormControlInput5"  value="'.$ItemDiscount.'">
                    </div>
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">Item Ratings</label>
                        <input type="text" name="rating" onblur=" validaterating() " class="form-control " required id="exampleFormControlInput6"  value="'.$ItemRating.'" >
                    </div>
                    <div class="form-group ">
                        <label for="exampleFormControlSelect1">Item Stars</label>
                        <select class="form-control " name="star" onblur=" validatestar() " id="exampleFormControlSelect1"  >
                          <option class="text-muted">Select Stars</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          
                        </select>
                      </div>

                      <div class="form-group ">
                        <label for="exampleFormControlSelect2">Item Category</label>
                        <select class="form-control " name="category" onblur=" validatecategory() " required id="exampleFormControlSelect2"   >
                            <option class="text-muted">Select Category</option>
                            <option>Men</option>
                            <option>Women</option>
                            <option>Electronics</option>
                          
                        </select>
                      </div>

                      <div class="form-group ">
                        <label for="exampleFormControlTextarea1">Item Description</label>
                        <textarea class="form-control " name="desc" required id="exampleFormControlTextarea1"  rows="3">'.$ItemDesc.'</textarea>
                      </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Choose Item Image</label>
                        <input type="file"   name="img" class="form-control-file" required id="exampleFormControlFile1">
                      </div>
                
                
                   <p class="text-center"><button type="submit" name="InsertSubmit" class="btn btn-success ">Insert</button></p> 
                </form>
            </div>
            
            <div class="col-md-6" style="padding: 0 50px;">
                <h2 class="text-center text-primary">Update Item</h2>
                <h4 class=" text-primary">Select Item</h4>
                
<!--                searchitem-->
                
               <div style="margin-bottom: 50px  ;">
                <form id="insertsubmiterror" action="includes/AdminUpdate_inc.php" onSubmit="return validatesubmit();" method="post">
                    <div class="form-group  ">
                        <label for="exampleFormControlInput1 ">Item ID</label>
                        <input name="searchid" type="text" onblur=" validatesearchid() " class="form-control " required id="searchitemid" >
                    </div>
                    
                
                
                    <button type="submit" name="searchItem" class="btn btn-success">Submit</button>
                </form></div>';
                
                
//<!--                updateform-->


                
                 
                 if(isset($_GET['success']) && $_GET['success'] == 'itemfound'){
    
    
                     echo '<div><p class="flash success" id="fadeback">Item Found!</p>';
                    $ItemDescu = $_GET['desc'];
                    $ItemNameu = $_GET['name'];
                    $ItemPriceu = $_GET['price'];
                    $ItemDiscountu = $_GET['discount'];
                    $ItemRatingu = $_GET['rating'];
                    $ItemQuantityu = $_GET['quantity'];
                    $ItemIDu = $_GET['itemid'];


                    echo '<h4 class="text-primary">Found Item</h4>



                    <form id="insertsubmiterror" action="includes/AdminUpdate_inc.php" onSubmit="return validateupdatesubmit();" method="post">
                        <input type="hidden" name="idu" value="'.$ItemIDu.'">
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Item Name</label>
                            <input type="text" name="nameu" class="form-control "  required id="exampleFormControlInput2u" value="'.$ItemNameu.'">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Item Price</label>
                            <input type="text" name="priceu" onblur=" validatepriceu() " class="form-control " required id="exampleFormControlInput3u" value="'.$ItemPriceu.'" >
                        </div>
                         <div class="form-group  ">
                            <label for="exampleFormControlInput1 ">Item Quantity</label>
                            <input type="text" name="quantityu" onblur=" validatequantityu() " class="form-control " required id="exampleFormControlInput4u" value="'.$ItemQuantityu.'">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Item Discount</label>
                            <input type="text" name="discountu" onblur=" validatediscountu() " class="form-control " required id="exampleFormControlInput5u"  value="'.$ItemDiscountu.'">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Item Ratings</label>
                            <input type="text" name="ratingu" onblur=" validateratingu() " class="form-control " required id="exampleFormControlInput6u"  value="'.$ItemRatingu.'" >
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlSelect1">Item Stars</label>
                            <select class="form-control " name="staru" onblur=" validatestaru() " id="exampleFormControlSelect1u"  >
                              <option class="text-muted">Select Stars</option>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>

                            </select>
                          </div>

                          <div class="form-group ">
                            <label for="exampleFormControlSelect2">Item Category</label>
                            <select class="form-control " name="categoryu" onblur=" validatecategoryu() " required id="exampleFormControlSelect2u"   >
                                <option class="text-muted">Select Category</option>
                                <option>Men</option>
                                <option>Women</option>
                                <option>Electronics</option>

                            </select>
                          </div>

                          <div class="form-group ">
                            <label for="exampleFormControlTextarea1">Item Description</label>
                            <textarea class="form-control " name="descu" required id="exampleFormControlTextarea1u"  rows="3">'.$ItemDescu.'</textarea>
                          </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choose Item Image</label>
                            <input type="file"   name="imgu" class="form-control-file" required id="exampleFormControlFile1u">
                          </div>


                       <p class="text-center"><button type="submit" name="UpdateSubmit" class="btn btn-success ">Update</button></p> 
                    </form></div>
        
        
        
        </div>';}echo '</div></div>';
  
}
else{
    echo '<h1 style="margin-bottom:300px; margin-top:80px;">You are not logged in!</h1>';

    
    
}
require "footer.php";


                    ?>
            
    <script>
        

//        global
        function validatenum(id){
            var phone = document.getElementById(id);
           
            if(isNaN(phone.value)){

                return false;
           }
           else{
              
               return true;
           }
          
       }
        
        
        
        
 //       forinsert form
        
        
        function validateid(){
            var check = validatenum('exampleFormControlInput1');
            if(!check){
                document.getElementById('exampleFormControlInput1').focus();
                document.getElementById("fade").innerHTML="Please enter numeric values only";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                
                
            }return check;
        }
        function validateprice(){
            var check = validatenum('exampleFormControlInput3');
            if(!check){
                 document.getElementById('exampleFormControlInput3').focus();
                document.getElementById("fade").innerHTML="Please enter numeric values only";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                
                
            }return check;
        }
        function validatequantity(){
            var check = validatenum('exampleFormControlInput4');
            if(!check){
                 document.getElementById('exampleFormControlInput4').focus();
                document.getElementById("fade").innerHTML="Please enter numeric values only";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                
               
            } return check;
        }
        function validatediscount(){
            var check = validatenum('exampleFormControlInput5');
            if(!check){
                 document.getElementById('exampleFormControlInput5').focus();
                document.getElementById("fade").innerHTML="Please enter numeric values only";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                
                
            }
            return check;
        }
        function validaterating(){
             
            var check = validatenum('exampleFormControlInput6');
            if(!check){document.getElementById('exampleFormControlInput6').focus();
                document.getElementById("fade").innerHTML="Please enter numeric values only";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                
                
            }
            return check;
        }
        function validatestar(){
            var stars = document.getElementById("exampleFormControlSelect1");
             
            if(stars.options[stars.selectedIndex].text == 'Select Stars'){
                document.getElementById("fade").innerHTML="Please select proper Item star ";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                stars.focus();
                return false;
            }
            else{return true;}
            }
        function validatecategory(){
            
             var Category = document.getElementById("exampleFormControlSelect2");
        
            if( Category.options[Category.selectedIndex].text == 'Select Category'){
                document.getElementById("fade").innerHTML="Please select proper Item category ";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                Category.focus();
                return false;
            }
            else{return true;}
            }
        
        function validateinsertsubmit(){
           
            var check = validateid()&&validateprice()&&validatequantity()&&validatediscout()&&validaterating()&&validatestar()&&validatecategory();
            if(!check){
                document.getElementById("fade").innerHTML="Please enter the details correctly";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                return check;
               
            }else{return true;}
         return true;
    
        
            }
        
        
     //       for search item form   
        
        
        function validatesearchid(){
             
            var check = validatenum('searchitemid');
            if(!check){document.getElementById('searchitemid').focus();
                document.getElementById("fade").innerHTML="Please enter numeric values only";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                
                
            }
            return check;
        }
        
        
//       for update form
        
        
     
    
        function validatepriceu(){
            var check = validatenum('exampleFormControlInput3u');
            if(!check){
                 document.getElementById('exampleFormControlInput3u').focus();
                document.getElementById("fade").innerHTML="Please enter numeric values only";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                
                
            }return check;
        }
        function validatequantityu(){
            var check = validatenum('exampleFormControlInput4u');
            if(!check){
                 document.getElementById('exampleFormControlInput4u').focus();
                document.getElementById("fade").innerHTML="Please enter numeric values only";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                
               
            } return check;
        }
        function validatediscountu(){
            var check = validatenum('exampleFormControlInput5u');
            if(!check){
                 document.getElementById('exampleFormControlInput5u').focus();
                document.getElementById("fade").innerHTML="Please enter numeric values only";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                
                
            }
            return check;
        }
        function validateratingu(){
             
            var check = validatenum('exampleFormControlInput6u');
            if(!check){document.getElementById('exampleFormControlInput6u').focus();
                document.getElementById("fade").innerHTML="Please enter numeric values only";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                
                
            }
            return check;
        }
        function validatestaru(){
            var stars = document.getElementById("exampleFormControlSelect1u");
             
            if(stars.options[stars.selectedIndex].text == 'Select Stars'){
                document.getElementById("fade").innerHTML="Please select proper Item star ";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                stars.focus();
                return false;
            }
            else{return true;}
            }
        function validatecategoryu(){
            
             var Category = document.getElementById("exampleFormControlSelect2u");
        
            if( Category.options[Category.selectedIndex].text == 'Select Category'){
                document.getElementById("fade").innerHTML="Please select proper Item category ";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                Category.focus();
                return false;
            }
            else{return true;}
            }
        
        function validateupdatesubmit(){
           
            var check = validatepriceu()&&validatequantityu()&&validatediscountu()&&validateratingu()&&validatestaru()&&validatecategoryu();
            if(!check){
                document.getElementById("fade").innerHTML="Please enter the details correctly";
                
                document.getElementById("fade").style.display = "block";
                $('#fade').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
                return check;
               
            }else{return true;}
         return true;
    
        
            }
        
        
        
        

        
        
        
        
        
        //        for fade effect
        
        
        
        $('#fadeback').delay(500).fadeIn('normal', function() {$(this).delay(1500).fadeOut();});
        
        
        
        
    </script>
    
    
 
    
    
    
    
    
    <style>
    .flash{
        
        position: fixed;
        top: 5%;
        left: 50%;
        transform: translate(-50%,-5%);
        
        padding:5px 30px;
        z-index:100;
    }
        .danger{
            background-color: rgba(255,204,203,.5);
        color:red;
        border: solid 1px red;
        border-radius: 5px;
        }
        .success{
            background-color: rgba(208,240,190,.5);
        color:green;
        border: solid 1px darkgreen;
        border-radius: 5px;
            
        }
        .nodisp{
            display:none;
        }

</style>


    
    
    
    
    </body></html>
    
    
    
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
