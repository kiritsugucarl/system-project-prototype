<?php
session_start();
include '../script/php/connection.php'
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
    <title>LOGIN</title>
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

      <!-- LOGIN FORM -->
      <div class="login-form">
        <h1>Login</h1>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
          <span>Phone/Email &nbsp;:&nbsp;</span>
          <input
            class="form--text-box"
            type="text"
            name="username"
            placeholder="Enter Phone/Password"
            autocomplete="off"
          />
          <br/>
          <span>Password &nbsp; :&nbsp; </span>
          <input
            class="form--text-box"
            type="password"
            name="password"
            placeholder="Enter Password"
            autocomplete="off"
            id="password"
          />
          <i class="eye far fa-eye" id="togglePassword"></i>
          <br/>
          <br/>
          <div class="middle-button">
            <input
              class="form--submit-btn button"
              type="submit"
              name="login"
              value="Log In"
            />
          </div>
        <script src="../script/js/showPassword.js"></script>

        </form>
<?php
if (isset($_POST['login'])) {
    $uName = $_POST['username'];
    $pWord = $_POST['password'];

    $query = "SELECT id, username, password FROM " . $tableName . " WHERE username = '" . $uName . "' AND password = '" . $pWord . "';";
    $sql = mysqli_query($conn, $query);
    $retval = mysqli_fetch_array($sql);

    if (is_array($retval)) {
        $_SESSION["uName"] = $retval['username'];
        $_SESSION["pWord"] = $retval['password'];
    } else {
        echo '<span class="invalid">Invalid username or password</span>';
    }

    if (isset($_SESSION["uName"])) {
        header("Location:../index.php");
    }
}
?>
      </div>
    </div>

    <script src="..script/js/time.js"></script>
  </body>
</html>
