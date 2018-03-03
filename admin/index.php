<?php
session_start();
      if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
      {
       header("Location:Login.php");  
   }else{
       echo $_SESSION['use'];

       echo "Login Success";
   }



   ?>

   <?php include 'header.php'; ?>
   <?php include 'config/config.php'; ?>
   <div class="container_12">
    <?php include 'user_profile.php'; ?>
    <?php include 'manu.php'; ?>
    <div class="grid_10">

        <div class="box round first grid">
            <h2> Dashbord</h2>
            <div class="block">               
              Welcome admin panel        
          </div>
      </div>
  </div>
  <div class="clear">
  </div>
</div>
<div class="clear">
</div>
<?php include 'footer.php'; ?>
</body>
</html>
