<?php
session_start();
include '../script/php/connection.php';
if (!isset($_SESSION['otpCred'])) {
    header("Location:register.php");
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
    <title>IDENTITY CONFIRMATION</title>
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

      <!-- OTP ENTER -->
      <div class="enterOTP-section">
        <h3>Enter the PIN that was sent to your email/phone number :</h3>
        <form
        method="POST"
        class="digit-group"
        data-group-name="digits"
        data-autosubmit="false"
        autocomplete="off"
        action="<?=$_SERVER['PHP_SELF'];?>"
        >
          <div class="digit-input">
            <?php
if (isset($_SESSION['otpCred'])) {
    echo '
      <input type="hidden" name="otpCred" value="' . $_SESSION['otpCred'] . '" />
    ';
}
?>
            <input
            type="text"
            id="digit-1"
            name="digit-1"
            data-next="digit-2"
            required
            />
            <input
            type="text"
            id="digit-2"
            name="digit-2"
            data-next="digit-3"
            data-previous="digit-1"
            required
            />
            <input
            type="text"
            id="digit-3"
            name="digit-3"
            data-next="digit-4"
            data-previous="digit-2"
            required
            />
            <input
            type="text"
            id="digit-4"
            name="digit-4"
            data-next="digit-5"
            data-previous="digit-3"
            required
            />
          </div>
          <br/>
          <br/>
          <div class="middle-button">
            <input
              type="submit"
              name="submit_otp"
              value="Submit OTP"
              class="form--submit-btn button"
            />
          </div>
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../script/js/otp.js"></script>
        <?php
if (isset($_POST['submit_otp'])) {
    $otp = strval($_POST['digit-1']) + strval($_POST['digit-2']) + strval($_POST['digit-3']) + strval($_POST['digit-4']);
    if ($otp == 10) {
        header("Location:register-info.php");
    } else {
        echo '
            <span class="invalid">Wrong PIN, try again</span>
            ';
    }
}
?>
      </div>

    </div>

    <script src="../script/js/time.js"></script>
  </body>
</html>
