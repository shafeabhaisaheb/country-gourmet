
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name=viewport content="width=device-width, initial-scale=1">
  <title>BayBridge Technologies | Web & Mobile Application Development, Software & Tech Solutions Company</title>
  
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <meta name="description" content="BayBridge develops world-class web and mobile applications, provides custom software development services and technology solutions for startups and enterprises." />
  <meta name="keywords" content="Web applications development, Content Management Systems, CMS, Social Software, Ecommerce, Marketplace development" />
  <meta name="DC.title" content="Developing outstanding web & mobile products" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Rubik|Work+Sans|Cinzel:700|Pacifico" rel="stylesheet">

  <link rel="stylesheet" href="maincss.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <script>
  (function() {
  'use strict';
  window.addEventListener('load', function() {

    var forms = document.getElementsByClassName('needs-validation');

    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</head>

<body>

  <?php

    $msg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $msg = "<i class='far fa-thumbs-up fa-lg'></i>Thank you! We will get back to you soon.";
     }
 
  ?>
      <!-- header starts here-->
      

      <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary justify-content-between">

        <a href="index.html"><img src="mainlogo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
         <ul class="navbar-nav">
           <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="about_us.html">About Us</a>
           </li>
          <li class="nav-item">
            <a class="nav-link" href="services.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="careers.html">Careers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact_us.html">Contact Us</a>
          </li>

         </ul>
        </div>
        <!-- Navbar content -->
      </nav>
      <!-- header ends here-->

      <div class="jumbotron jumbotron-fluid" id="contactusbanner">
      </div>

      <!--main content starts here-->

      <div class="container" id="contactus">
        <h2>We would love to hear from you!</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="needs-validation" novalidate>

          <div class="form-row">
            <div class="col-sm">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" placeholder="Name" required>
                <div class="invalid-feedback">
                  Please enter your name.
              </div>
              </div>
              <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
                <div class="invalid-feedback">
                   Please enter your email.
              </div>
              </div>
              <div class="form-group">
                <label for="inputMessage">Message</label>
                <textarea class="form-control" id="inputMessage" rows="7" required></textarea>
                <div class="invalid-feedback">
                   Please enter a message.
              </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <div class="col-sm">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3170.3240373908616!2d-122.03852058529587!3d37.382168442424074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb6578faae615%3A0x784edd3e107f7441!2s640+W+California+Ave%2C+Sunnyvale%2C+CA+94086!5e0!3m2!1sen!2sus!4v1529782977427" class="maps" allowfullscreen></iframe>
            </div>
        </div>
    </form>
             <?php
              echo "<div style='padding:20px 0px; font-size:1.2em;'>" . $msg . "</div>";
              ?>
  </div>

  
    <div class="jumbotron jumbotron-fluid" id="contactuspic">
      </div>

    <div class="container-fluid">
    <div class="row justify-content-between text-center" id="about">
        <div class="col-sm">
          <h2>About</h2>
          <p> We are a full-service software development company focused on creating remarkable web and mobile applications. We work with startups and enterprises to rapidly evolve ideas to product. </p>
        </div>
        <div class="col-sm">
            <h2>Contact</h2>
            
              <i class="fas fa-envelope-square"></i>
              <a href='mailto:info@baybridgetechnology.com'>info@baybridgetechnology.com</a>
            
              <br>
              <i class="fas fa-phone-square"></i>
              <span> (408) 594 8740 </span> 
            
              <br>
              <i class="far fa-building"></i>
              <span>640 W California Ave #210, Sunnyvale, CA 94086</span>    
        </div>
      </div>
    </div>

    <footer class="text-center">
   
        <a href="contact_us.html">Contact us</a> |
        <a href="privacy_policy.html">Privacy Policy</a> |
        <a href="refund_policy.html">Refund Policy</a> 
      
    </footer>
     <div class="container-fluid copyright text-center">
      © 2017 BayBridge Technology Pvt. Ltd.
    </div>

</body>
</html>