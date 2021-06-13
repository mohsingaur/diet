<?php
session_start();
include 'includes/config.php';
@include 'includes/credits.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Contact Us | Documento </title>
  <?php 
    include 'includes/heads.php';
  ?>
</head>
<body>

<?php
include 'includes/nav.php';
include 'includes/loginModal.php';
include 'includes/signupModal.php';
include 'includes/forgetpwdModal.php';
?>

<div id="contact">
  <div class="context">
    <h3>Get in Touch! We would love to hear from you.</h3>
    <p>You are not going to hit a ridiculously long phone menu when you call us. Your email isn't going to the inbox abyss, never to be seen or heard from again. At Choice Screening, we provide the exception service we would want to experience ourselves.</p>
  </div>

  <div class="context2">
  <div class="col-md-6">
    <div class="col-md-5">
      <h3>Primary Contacts</h3>
      <ul>
        <li> <b>Mohsin Gaur</b> </li>
        <li>Email: mohsin@mydocworld.com</li>
        <li>Tel: 9871048306</li>
      </ul>

    </div>

    <div class="col-md-7">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d223294.6933454837!2d77.63971893877243!3d29.01759430751386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390c66b970fc9407%3A0xc1202ed0f29bc85a!2sDelhi%20Institute%20of%20Engineering%20%26%20Technology(DIET)!5e0!3m2!1sen!2sin!4v1623568549363!5m2!1sen!2sin" width="100%" height="315" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    
  </div>

  <div class="col-md-6">
    <div class="well well-sm"> Get in Touch</div>
    <form class="form-horizontal" method="post">
      <div class="row">
        <div class="col-md-6">
          <label>Name</label>
          <input class="form-control input-sm" type="text" name="fname" placeholder="Your Full Name">
        </div>
        <div class="col-md-6">
          <label>Email</label>
          <input class="form-control input-sm" type="text" name="mail" placeholder="Your Email">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <label>Your Query or Question</label>
          <textarea class="form-control input-sm" rows="5" name="message" placeholder="Enter your Question"></textarea>
      </div>
      </div>
      <br>
      <input class="btn btn-default" type="submit" name="send" value="Send">
    </form>
  </div>
  </div>
	
</div>

<?php
include 'includes/footer.php';
?>

</body>
</html>

<?php
  extract($_POST);
  if (isset($send)) {
    $run = mysqli_query($link, "INSERT INTO queries VALUES ('','$fname','$mail','$message',current_date())" );
    if($run){
      echo "
      <div class='alert-box fix-alert'>
      <div class='alert alert-success'>
        <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Thanks!</strong> Our contact team will connect you shortly.
      </div>
      </div>";
    }
    else{
      echo "
      <div class='alert-box'>
      <div class='alert alert-danger fix-alert'>
        <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Sorry!</strong> Something goes wrong with your Internet connection. Please contact administrator at mohsin@mydocworld.com 
      </div>
      </div>
      ";
    }
  }
?>