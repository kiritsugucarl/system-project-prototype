<?php
session_start();
include '../script/php/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
}

$sql = "SELECT id from users WHERE username='" . $_SESSION['uName'] . "';";
$retval = mysqli_query($conn, $sql);
$user_id = mysqli_fetch_array($retval);

$sql = "SELECT * from assistance_data WHERE user_id='" . $user_id['id'] . "';";
$retval = mysqli_query($conn, $sql);
$assistance = mysqli_fetch_array($retval);
if (isset($assistance)) {
    $assistance_date = new DateTime($assistance['assistance_date']);
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
    <title>MY ASSISTANCE</title>
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

      <div class="active-assistance-list">
        <h1> Assistance Applied : </h1>
        <?php
if (!isset($assistance)) {
    echo '<h4>There are no assistances applied on this account.</h4>';
}
if (isset($assistance)) {
    echo '
    <div class="active-assistance--section">
      <h4> <b> Assistance </b>: ' . $assistance['assistance_type'] . '</h4>
      <h4>Application # ' . $assistance['assistance_id'] . '</h4>
      <h4><b> Date received </b> : ' . $assistance_date->format("F d, Y") . ' </h4>
      <h4><b>Status </b>: <span class="status-quo"> ' . $assistance['assistance_status'] . '</span></h4>
    </div>
  ';
}
?>
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
