<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.mi.css">-->
  
<?php 
require "bootstrap.php";
require "navbar.php";
?>


<header class="bg-primary text-center py-5 mb-4" style="margin-top:51px;">
  <div class="container">
    <h1 class="font-weight-light text-white">Meet the Team</h1>
  </div>
</header>

<!-- Page Content -->
<div class="container about" style="margin:51px auto;">
  <div class="row">
    <!-- Team Member 1 -->
    <div class="col-xl-3 col-md-3 mb-4">
      <div class="card border-0 shadow">
        <img src="images/bhaskar.jpeg" class="card-img-top img-responsive" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Bhaskarjyoti Sarma</div>
        </div>
      </div>
    </div>
    <!-- Team Member 2 -->
    <div class="col-xl-3 col-md-3 mb-4">
      <div class="card border-0 shadow">
        <img src="images/ajay.jpeg" class="card-img-top img-responsive" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Ajay Das</div>
        </div>
      </div>
    </div>
    <!-- Team Member 3 -->
    <div class="col-xl-3 col-md-3 mb-4">
      <div class="card border-0 shadow">
        <img src="images/anirudha.jpg" class="card-img-top img-responsive" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Annirudha Chokraborty</div>
        </div>
      </div>
    </div>
    <!-- Team Member 4 -->
    <div class="col-xl-3 col-md-3 mb-4">
      <div class="card border-0 shadow">
        <img src="images/rahul.jpg" class="card-img-top img-responsive" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Rahul Kumar Nath</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
<style>

   .about img {
        width:100%;
        height: 300px;
    }

</style>
<?php 
require "footer.php";
?>