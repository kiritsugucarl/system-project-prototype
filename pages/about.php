<?php
session_start();
include '../script/php/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/styles/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="../assets/images//mandaluyong-city-logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&display=swap" rel="stylesheet">
    <title>ABOUT PAGE</title>
  </head>
  <body>
    <div class="root">
      <!-- HEADER SECTION -->
      <header>
        <div class="logo">
          <a href="../index.php">
            <img
            src="../assets/images/mandaluyong-city-logo.png"
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
            <a class="button" href="../index.php">Home</a>
            <a class="button" href="assistance.php">Assistance</a>
            <a class="button" href="myAssistance.php">My Assistance</a>
            <a class="button" href="profile.php">Profile</a>
            <a class="button" href="about.php">About</a>
          </div>
          <div class="nav--end">
          <?php
// Verify if logged in
if (isset($_SESSION['isLoggedIn'])) {
    $sql = "SELECT user_fullName FROM users WHERE username ='" . $_SESSION['uName'] . "';";
    $retval = mysqli_query($conn, $sql);
    $active_user = mysqli_fetch_array($retval);
    echo '
                <p>Hello ' . $active_user['user_fullName'] . '. <a href="../script/php/logout.php" class="button">Logout.</a> </p>
          ';
}
if (!isset($_SESSION['isLoggedIn'])) {
    echo '
    <a class="button" href="login.php">Login</a>
    <a class="button" href="register.php">Register</a>
  ';
}
?>
          </div>
        </div>
      </nav>

      <!-- ABOUT SECTION -->
      <div class="about-section">
        <div class="welcome--section">
          <img class="welcome--person" src="../assets/images/human-placeholder.webp"/>
          <div class="about--congressman">
            <h1 class="about--title">Name of Congressman</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab quas, numquam nemo, veniam veritatis qui necessitatibus recusandae quos in fugiat, sequi ipsam provident eligendi doloribus labore nisi? Ducimus, minima autem!</p>
          </div>
        </div>
      </div>

      <!-- PERSONELL SECTION -->
      <h2 class="personell-title">Personell of the Congressman</h2>
      <div class="personell-section">
        <div class="personell--tile">
          <img src="../assets/images/human-placeholder.webp" class="personell-person"/>
          <div class="personell--info">
            <h4>Name of Person</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam voluptates, eum consectetur soluta sequi nisi ratione cum beatae velit recusandae ab nulla consequatur temporibus numquam est itaque voluptatibus. Tempora, accusantium.</p>
          </div>
        </div>

        <div class="personell--tile">
          <img src="../assets/images/human-placeholder.webp" class="personell-person"/>
          <div class="personell--info">
            <h4>Name of Person</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam voluptates, eum consectetur soluta sequi nisi ratione cum beatae velit recusandae ab nulla consequatur temporibus numquam est itaque voluptatibus. Tempora, accusantium.</p>
          </div>
        </div>
      </div>

      <div class="personell-section">
        <div class="personell--tile">
          <img src="../assets/images/human-placeholder.webp" class="personell-person"/>
          <div class="personell--info">
            <h4>Name of Person</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam voluptates, eum consectetur soluta sequi nisi ratione cum beatae velit recusandae ab nulla consequatur temporibus numquam est itaque voluptatibus. Tempora, accusantium.</p>
          </div>
        </div>

        <div class="personell--tile">
          <img src="../assets/images/human-placeholder.webp" class="personell-person"/>
          <div class="personell--info">
            <h4>Name of Person</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam voluptates, eum consectetur soluta sequi nisi ratione cum beatae velit recusandae ab nulla consequatur temporibus numquam est itaque voluptatibus. Tempora, accusantium.</p>
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

      <div class="addresses">
        <div class="address--title">
          <h4>Addresses</h4>
        </div>
        <div class="address-tiles">
          <div class="address--tile">
            <h5>Address</h5>
            <p>Sample address 123, address 456, 789 City</p>
          </div>
          <div class="address--tile">
            <h5>Address</h5>
            <p>Sample address 123, address 456, 789 City</p>
          </div>
          <div class="address--tile">
            <h5>Email Address</h5>
            <p>sample_email@email.com</p>
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

    <script src="../script/js/time.js"></script>
  </body>
</html>
