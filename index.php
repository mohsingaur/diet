<?php
session_start();
include 'includes/config.php';
@include 'includes/credits.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home | Document Sharing </title>
  <?php
    include 'includes/heads.php';
  ?>

</head>
<body onload="loadMore(10)">


<?php
include 'includes/nav.php';
include 'includes/loginModal.php';
include 'includes/signupModal.php';
include 'includes/forgetpwdModal.php';
include 'includes/commentModal.php';
?>

<div id="banner">
  <div class="banner-txt">
    DOCUMENT HUB
  </div>
  <form class="search-input" method="post">
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-search"></i></div>
        <input type="text" class="form-control" id="search" name="search" placeholder="Search Documents" onkeyup="searchPaper(this.value)">
      </div>
      <div class="slideShowButton">
        <img src="images/slideshow-arrow-down.png">
      </div>
    </div>
  </form>
  <div id="s-modal"></div>
</div>


<div id="study">

  <div class="content">
    
    <h1>Latest Uploads</h1>
    
    <div id="uploads"></div>
  
  </div> <!-- content class ends here-->

</div> <!-- study id ends here-->


</body>
</html>
