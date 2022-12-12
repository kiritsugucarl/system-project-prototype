<?php
session_start();
include '../script/php/connection.php';

if (isset($_POST['assistance_name'])) {
    $sql = "SELECT * FROM users WHERE username='" . $_SESSION['uName'] . "';";
    $retval = mysqli_query($conn, $sql);
    $assistance = mysqli_fetch_array($retval);
} else {
    header("Location:assistance.php");
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
    <title>APPLICATION PAGE</title>
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

      <!-- Application Form -->

<?php if (!isset($assistance['user_assistance_cooldown'])) {
    echo '
    <div class="application-form1">
        <form action="application-success.php" method="POST" enctype="multipart/form-data">
          <h3>Assistance Form</h3>
        <span>Assistance to apply for : </span>
        <input
          class="form--text-box"
          type="text"
          disabled
          value="' . $_POST['assistance_name'] . '"
          />
            <input
            type="hidden"
            name="assistance_type"
            value="' . $_POST['assistance_name'] . '"
          />
          <br/><br/>
        <span>Name : </span>
        <input
          class="form--text-box regi-box"
          type="text"
          disabled
          value="' . $assistance['user_fullName'] . '"
        />
          <input
            type="hidden"
            name="assistance_user"
            value="' . $assistance['user_fullName'] . '"
          />
        <br/><br/>
        <input
          type="hidden"
          name="user_id"
          value ="' . $assistance['id'] . '"
        />
        <input
        type="file"
        class="form--file button"
        name="picture"
        value="Select a File : "
        required
        />
        <br/>
        <br/>

        <div class="middle-button">
          <input
          type="submit"
          name="apply"
          class="form--submit-btn button"
          value="Apply"
          />
        </div>
        </form>'
    ;
}
if (isset($assistance['user_assistance_cooldown'])) {
    $sql = "SELECT * FROM assistance_data WHERE user_id='" . $assistance['id'] . "';";
    $retval = mysqli_query($conn, $sql);
    $status_id = mysqli_fetch_array($retval);
    echo '
    <div class="application-form">
      <h3><span class="invalid">Oopsie</span>, it seems like you still have an application ongoing.</h3>
      <div class="application--details">
      <h4>Application # ' . $status_id['assistance_id'] . ' </h4>
      <h4>Status : <span class="status-quo">' . $status_id['assistance_status'] . '</span> </h4>
      <a class="button" href="myAssistance.php">See more</a>
      </div>
  ';
}
?>
      </div>
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
