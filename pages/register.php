<?php
session_start();
include '../script/php/connection.php';
unset($_SESSION['otpCred']);

if (isset($_SESSION['isLoggedIn'])) {
    header("Location:../index.php");
}
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
    <title>REGISTER</title>
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
            <a class="button" href="login.php">Login</a>
            <a class="button" href="register.php">Register</a>
          </div>
        </div>
      </nav>

      <!-- REGISTRATION FORM -->
      <div class="registration-form">
        <h1>Registration Details</h1>
        <div class="form--form_section">
        <form
            action="<?=$_SERVER['PHP_SELF']?>"
            method="POST"
        >
          <p>Enter your email or phone number to verify : <br/> </p>
          <div class="middle-button">
            <input
              type="text"
              class="form--text-box focusable-text"
              name="otpCred"
              required
              autocomplete="off"
            />
          </div>
          <br/>
          <br/>
          <div class="middle-button">
            <input
              type="submit"
              class="form--submit-btn button"
              name="getOtp"
              value="GET OTP"
            />
          </div>
        </form>
        <?php
if (isset($_POST['getOtp'])) {
    $otpCred = $_POST['otpCred'];
    $query = "SELECT * from users WHERE username = '" . $otpCred . "';";
    $sql = mysqli_query($conn, $query);
    $retval = mysqli_fetch_array($sql);
    $_SESSION['otpCred'] = $otpCred;

    if (is_array($retval)) {
        echo '<span class="invalid">Email/Phone already used</span>';
    } else {
        header("Location:otp.php");
    }
}
?>
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