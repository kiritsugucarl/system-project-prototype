<?php
session_start();
include '../script/php/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header('Location:login.php');
}

if (isset($_SESSION['isLoggedIn'])) {
    $sql = "SELECT * FROM users WHERE username='" . $_SESSION['uName'] . "';";
    $retval = mysqli_query($conn, $sql);
    $user_data = mysqli_fetch_array($retval);
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
    <title>PROFILE</title>
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

      <div class="profile-section">
        <div class="profile-section--header">
          <h2><?php echo $user_data['user_fullName'] ?>'s Profile</h2>
          <small>User #<?php echo $user_data['id'] ?></small>
          <?php
if (isset($user_data['user_assistance_cooldown'])) {
    echo '<p>Ineligible for Application for ' . $user_data['user_assistance_cooldown'] . ' days</p>';
}
if (!isset($user_data['user_assistance_cooldown'])) {
    echo '<p>Eligible for Application</p>';
}
?>
        </div>

        <h3>Personal Information</h3>
        <div class="profile-section--tile">
          <p><b>Birthdate : </b> <?php echo $user_data['user_birthdate'] ?></p>
          <p><b>Sex : </b> <?php echo $user_data['user_sex'] ?></p>
          <p><b>Contact Number : </b> <?php echo $user_data['user_contact'] ?></p>
          <p><b>Religion : </b> <?php echo $user_data['user_religion'] ?></p>
          <p><b>Marital Status : </b> <?php echo $user_data['user_mariStat'] ?></p>
          <p><b>Current Address : </b> <?php echo $user_data['user_curAddress'] ?></p>
          <p><b>Permanent Address : </b><?php echo $user_data['user_permAddress'] ?></p>
          <p><b>Provincial Address : </b><?php echo $user_data['user_provAddress'] ?></p>
          <p><b>Place of Birth : </b> <?php echo $user_data['user_placeOfBirth'] ?></p>
          <p><b>Nationality : </b><?php echo $user_data['user_nationality'] ?> </p>
        </div>

        <h3>Family Details</h3>
        <div class="profile-section--tile">
          <p><b>Mother :</b> <?php echo $user_data['user_mother'] ?></p>
          <p><b>Occupation : </b> <?php echo $user_data['user_mother_occ'] ?></p>
          <p><b>Birthdate : </b> <?php echo $user_data['user_mother_birthdate'] ?></p>
          <p><b>Father :</b> <?php echo $user_data['user_father'] ?></p>
          <p><b>Occupation : </b> <?php echo $user_data['user_father_occ'] ?></p>
          <p><b>Birthdate : </b> <?php echo $user_data['user_father_birthdate'] ?></p>
          <p><b>Siblings :</b></p>
          <?php
for ($i = 0; $i < 3; $i++) {
    echo '<p>' . $user_data['user_sibling' . $i + 1] . '</p>';
}
?>
          <p><b>Spouse : </b> <?php echo $user_data['user_spouse'] ?></p>
          <p><b>Birthdate : </b> <?php echo $user_data['user_spouse_birthdate'] ?></p>
          <p><b>Children :</b></p>
          <?php
for ($i = 0; $i < 3; $i++) {
    echo '<p>' . $user_data['user_child' . $i + 1] . '</p>';
}
?>
        </div>

        <h3>Work Details</h3>
        <div class="profile-section--tile">
          <p><b>Work :</b> <?php echo $user_data['user_work'] ?></p>
          <p><b>Work Company:</b> <?php echo $user_data['user_company'] ?></p>
          <p><b>Work Address:</b> <?php echo $user_data['user_work_add'] ?></p>
          <p><b>Work Salary:</b> <?php echo $user_data['user_work_salary'] ?></p>
        </div>

        <div class="reminder">
          <p>Your information that was registered isn't editable. For any account inquiries, please proceed to the office of the congressman.</p>
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
