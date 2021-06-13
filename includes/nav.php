<div class="fluid-container" id="hr">
  <div id="mynav" class="mynav">
    <a href="javascript:void(0)" onclick="menu()"> &#9776; </a> 
    <a href="index.php">MyDocWorld</a> 
    <a href="index.php"> <i class="fa fa-home"></i> Home</a> 
    <a href="aboutus.php"> <i class="fa fa-home"></i> About Us</a>
    <a href="docs.php?recs=1"> <i class="fa fa-file"></i> Documents</a> 
    <a href="contact.php"> <i class="fa fa-envelope"></i> Contact Us</a> 
    <?php 
      if (isset($_SESSION['userId'])) {
        include 'credits.php';
      ?>
      <a href="acc.php?profile"> Welcome <i class="fa fa-user"></i> <?=$_SESSION['userName']?> &nbsp; <i class="fa fa-certificate"> <?=$total_credits?> </i> </a>
      <?php }
      else{
        ?>
      
      <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#signup">Sign Up</a>
      <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#login"> <i class="fa fa-sign-in"></i> Login</a>
    
      <?php
      }
      ?>
  </div>
</div>