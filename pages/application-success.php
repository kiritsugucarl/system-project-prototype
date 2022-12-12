<?php
session_start();
include '../script/php/connection.php';

if (!isset($_POST['apply'])) {
    header("Location:application.php");
}
if (isset($_POST['apply'])) {
    $assistance_type = $_POST['assistance_type'];
    $assistance_user = $_POST['assistance_user'];

    // To get user_id
    $sql = "SELECT id FROM users WHERE username='" . $_SESSION['uName'] . "';";
    $retval = mysqli_query($conn, $sql);
    $val = mysqli_fetch_array($retval);
    $user_id = $val['id'];

    # File Handling Code
    if (isset($_FILES['picture'])) {
        $file = $_FILES['picture'];

        $fileName = $_FILES['picture']['name'];
        $fileTmpName = $_FILES['picture']['tmp_name'];
        $fileSize = $_FILES['picture']['size'];
        $fileError = $_FILES['picture']['error'];
        $fileType = $_FILES['picture']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'webp');

        # Check if the file extension is in the allowed file types
        if (in_array($fileActualExt, $allowed)) {
            # Check if there is no File Error
            if ($fileError === 0) {
                # Check if the File Size isnt very big
                if ($fileSize < 1000000) {
                    # Create a unique image id for the uploads
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    # The information where it directs to the exact file path from the root
                    $picture = "../uploads/assistance_id/" . $fileNameNew;
                    # Move the uploaded file to the file destination
                    move_uploaded_file($fileTmpName, $picture);
                } else {
                    echo '<script>alert("File is not applicable, please choose another");</script>';
                    header('Location:application.php');
                }
            } else {
                echo '<script>alert("File is not applicable, please choose another");</script>';
                header('Location:application.php');
            }
        } else {
            echo '<script>alert("File is not applicable, please choose another");</script>';
            header('Location:application.php');
        }
    }
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
    <title>APPLICATION</title>
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

      <div class="application-status">
<?php
$sql = "INSERT INTO assistance_data(
        assistance_type,
        assistance_user,
        user_id,
        assistance_status,
        assistance_identification)
        VALUES ('" . $assistance_type . "', '" .
    $assistance_user . "', '" .
    $user_id . "', '" .
    "Pending', '" .
    $picture . "');";

$apply = mysqli_query($conn, $sql);
if (!$apply) {
    die("Error");
}

// Add data in users database
$sql = "UPDATE users SET user_assistance ='" . $assistance_type . "', user_assistance_cooldown ='180' WHERE id =" . $user_id . ";";
$apply_cd = mysqli_query($conn, $sql);
?>
    <h1>Your application has been approved.</h1>
    <div class="application-status--details">
    <h4>Application # <?php
$sql = "SELECT * FROM assistance_data WHERE user_id = '" . $user_id . "'";
$retval = mysqli_query($conn, $sql);
$assistance_number = mysqli_fetch_array($retval);
echo $assistance_number['assistance_id'];
?> </h4>
    <h4>Date received : <?php echo $assistance_number['assistance_date'] ?> </h4>
    <h4>
        Status : <span class="success"><?php echo $assistance_number['assistance_status'] ?> </span>
    </h4>
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
