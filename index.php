<!--
  Created by Rizal Technological University Team :
Pineda
Ave
Acebo
Mendoza
-->

<?php
include 'script/php/connection.php'
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/styles/styles.css" />
    <link rel="icon" href="assets/images//mandaluyong-city-logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&display=swap" rel="stylesheet">
    <title>WELFARE SYSTEM</title>
  </head>
  <body>
    <div class="root">

      <!-- HEADER SECTION -->
      <header>
        <div class="logo">
          <a href="index.php">
            <img
            src="assets/images/mandaluyong-city-logo.png"
            alt="logo"
            class="logo--image"
            />
          </a>
          <div class="logo--text">
            <p>Lungsod ng Mandaluyong</p>
            <span><hr/></span>
            <p>Social Welfare System</p>
          </div>
        </div>
        <div class="nav--time">
          <h4>Time is <span id="time"></span></h4>
        </div>
      </header>

      <div class="custom-hr"> </div>

      <!-- NAVBAR SECTION -->
      <nav>
        <div class="nav--buttons">
          <div class="nav--start">
            <a class="button" href="pages/index.php">Home</a>
            <a class="button" href="pages/assistance.php">Assistance</a>
            <a class="button" href="pages/myAssistance.php">My Assistance</a>
            <a class="button" href="pages/profile.php">Profile</a>
            <a class="button" href="pages/about.php">About</a>
          </div>
          <div class="nav--end">
            <a class="button" href="pages/login.php">Login</a>
            <a class="button" href="pages/register.php">Register</a>
          </div>
        </div>
      </nav>

      <!-- ABOUT SECTION -->
      <div class="about-section">
        <div class="welcome--section">
          <img alt="congressman" class="welcome--person" src="assets/images/human-placeholder.webp" />
          <div class="about--congressman">
            <h1 class="about--title">Welcome</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam recusandae perspiciatis magni rerum facilis? Explicabo quibusdam a quis, enim reiciendis dignissimos consectetur quia, aperiam quidem commodi, quod tempora dicta consequatur.</p>
          </div>
        </div>
      </div>

      <!-- VMGO SECTION -->
      <div class="vmgo-section">
        <div class="vmgo--tile">
          <div class="vmgo--tile-title">
            <h4>Vision</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis quisquam ullam corporis culpa nihil doloremque blanditiis cupiditate veniam totam aliquid doloribus repellendus, quos consequatur atque suscipit velit natus officiis illum?</p>
          </div>
        </div>

        <div class="vmgo--tile">
          <div class="vmgo--tile-title">
            <h4>Mission</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis quisquam ullam corporis culpa nihil doloremque blanditiis cupiditate veniam totam aliquid doloribus repellendus, quos consequatur atque suscipit velit natus officiis illum?</p>
          </div>
        </div>

        <div class="vmgo--tile">
          <div class="vmgo--tile-title">
            <h4>Objective</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis quisquam ullam corporis culpa nihil doloremque blanditiis cupiditate veniam totam aliquid doloribus repellendus, quos consequatur atque suscipit velit natus officiis illum?</p>
          </div>
        </div>
      </div>

      <!-- CONTACT NUMBERS SECTION -->
      <div class="contactNum-section">
        <div class="contactNum--title">
          <h4>Primary Contact Numbers</h4>
        </div>
        <div class="contactNum--tiles-section">
          <div class="contactNum--tile">
            <h5>Title of Contact</h5>
            <p>123-456</p>
          </div>
          <div class="contactNum--tile">
            <h5>Title of Contact</h5>
            <p>123-456</p>
          </div>
          <div class="contactNum--tile">
            <h5>Title of Contact</h5>
            <p>123-456</p>
          </div>
          <div class="contactNum--tile">
            <h5>Title of Contact</h5>
            <p>123-456</p>
          </div>
          <div class="contactNum--tile">
            <h5>Title of Contact</h5>
            <p>123-456</p>
          </div>
        </div>
      </div>

      <!-- GET STARTED SECTION -->
      <div class="getStarted-section">
        <div class="getStarted-title">
          <h4>Social Welfare Program</h4>
        </div>
        <div class="getStarted--details">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, quibusdam expedita dolorem officia id nisi nesciunt enim. Deleniti totam delectus dolorem, magni quo atque ratione nihil libero aspernatur nesciunt porro?</p>
          <div class="getStarted--button">
           <a class="button" href="pages/application.php">Get Started on your Application Now</a>
          </div>
        </div>
      </div>

      <!-- FOOTER -->
      <footer>
          <hr>
          <p><i>System Welfare Project Prototype. The visuals you see might be still subjective to change.</i></p>
          <small>Created for the government of Mandaluyong City, Metro Manila</small> <br />
          <small><i>Created by Rizal Technological University - Boni Campus Team.</i></small> <br />
          <small><i>For inquiries, contact 0949 192 6132, or email at cdbpineda@rtu.edu.ph</i></small>
        </footer>
    </div>



    <script src="script/js/time.js"></script>
  </body>
</html>
