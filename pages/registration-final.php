<?php
include '../script/php/connection.php';
session_start();
if (!isset($_POST['register'])) {
    header("Location:register.php");
}

if (isset($_SESSION['isLoggedIn'])) {
    header("Location:../index.php");
}

// Account Credentials
$username = $_SESSION['otpCred'];
$password = $_POST['password'];

// User Persnal Information
$user_firstName = $_POST['user_firstName'];
$user_middleName = $_POST['user_middleName'];
$user_lastName = $_POST['user_lastName'];
$user_suffix = $_POST['user_suffix'];
$user_fullName = $user_firstName . " " . $user_middleName . " " . $user_lastName . " " . $user_suffix;
$user_birthdate = date('Y-m-d', strtotime($_POST['user_birthdate']));
$user_sex = $_POST['user_sex'];
$user_contact = $_POST['user_contact'];
$user_religion = $_POST['user_religion'];
$user_mariStat = $_POST['user_mariStat'];
$user_curAddress = $_POST['user_curAddress'];
$user_permAddress = $_POST['user_permAddress'];
$user_provAddress = $_POST['user_provAddress'];
$user_placeOfBirth = $_POST['user_placeOfBirth'];
$user_nationality = $_POST['user_nationality'];

// User Family Information
// Mother's Information
$user_mother = $_POST['user_mother'];
$user_mother_occ = $_POST['user_mother_occ'];
$user_mother_birthdate = date('Y-m-d', strtotime($_POST['user_mother_birthdate']));

// Father's Informatoin
$user_father = $_POST['user_father'];
$user_father_occ = $_POST['user_father_occ'];
$user_father_birthdate = date('Y-m-d', strtotime($_POST['user_father_birthdate']));

// Siblings
$user_sibling1 = $_POST['user_sibling1'];
$user_sibling2 = $_POST['user_sibling2'];
$user_sibling3 = $_POST['user_sibling3'];

// Spouse's Information
$user_spouse = $_POST['user_spouse'];
$user_spouse_occ = $_POST['user_spouse_occ'];
$user_spouse_birthdate = date('Y-m-d', strtotime($_POST['user_spouse_birthdate']));

// Children
$user_child1 = $_POST['user_child1'];
$user_child2 = $_POST['user_child2'];
$user_child3 = $_POST['user_child3'];

// Work Details
$user_work = $_POST['user_work'];
$user_company = $_POST['user_company'];
$user_work_add = $_POST['user_work_add'];
$user_work_salary = $_POST['user_work_salary'];
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
    <title>REGISTRATION</title>
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

      <div class="registration-process">
<?php
$sql = "INSERT INTO users(
    username,
    password,
    user_firstName,
    user_middleName,
    user_lastName,
    user_suffix,
    user_fullName,
    user_birthdate,
    user_sex,
    user_contact,
    user_religion,
    user_mariStat,
    user_curAddress,
    user_permAddress,
    user_provAddress,
    user_placeOfBirth,
    user_nationality,
    user_mother,
    user_mother_occ,
    user_mother_birthdate,
    user_father,
    user_father_occ,
    user_father_birthdate,
    user_sibling1,
    user_sibling2,
    user_sibling3,
    user_spouse,
    user_spouse_occ,
    user_spouse_birthdate,
    user_child1,
    user_child2,
    user_child3,
    user_work,
    user_company,
    user_work_add,
    user_work_salary)
    VALUES('" . $username . "', '" .
    $password . "', '" .
    $user_firstName . "', '" .
    $user_middleName . "', '" .
    $user_lastName . "', '" .
    $user_suffix . "', '" .
    $user_fullName . "', '" .
    $user_birthdate . "', '" .
    $user_sex . "', '" .
    $user_contact . "', '" .
    $user_religion . "', '" .
    $user_mariStat . "', '" .
    $user_curAddress . "', '" .
    $user_permAddress . "', '" .
    $user_provAddress . "', '" .
    $user_placeOfBirth . "', '" .
    $user_nationality . "', '" .
    $user_mother . "', '" .
    $user_mother_occ . "', '" .
    $user_mother_birthdate . "', '" .
    $user_father . "', '" .
    $user_father_occ . "', '" .
    $user_father_birthdate . "', '" .
    $user_sibling1 . "', '" .
    $user_sibling2 . "', '" .
    $user_sibling3 . "', '" .
    $user_spouse . "', '" .
    $user_spouse_occ . "', '" .
    $user_spouse_birthdate . "', '" .
    $user_child1 . "', '" .
    $user_child2 . "', '" .
    $user_child3 . "', '" .
    $user_work . "', '" .
    $user_company . "', '" .
    $user_work_add . "', '" .
    $user_work_salary . "');";

// echo $sql;

$register = mysqli_query($conn, $sql);
if (!$register) {
    die("Error");
}
?>
    <h1>Registration <span class="success">Success!</span></h1>
<?php
$sql = "SELECT user_fullName FROM users WHERE user_fullName='" . $user_fullName . "';";
$retval = mysqli_query($conn, $sql);
$registered_user = mysqli_fetch_array($retval);
// print_r($registered_user);
?>
    <div class="registration--status">
      <h4>The user <?php echo $registered_user['user_fullName'] ?> has been registered <span class="success">successfully.</span></h4>
      <p>You may now <a href="login.php">Login Here</a></p>
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
