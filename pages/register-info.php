<?php
session_start();
include '../script/php/connection.php';

if (!isset($_SESSION['otpCred'])) {
    header("Location:register.php");
}

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
                action="registration-final.php"
                method="POST"
            >
                <h3>Account Details</h3>
                <hr>

                <span>Email/Phone Number : </span>
                <?php
echo '
                        <input
                            disabled
                            type="text"
                            class="form--text-box regi-box"
                            name="otpCred"
                            autocomplete="off"
                            value="' . $_SESSION['otpCred'] . '"
                        />
                    '
?>
                <br/><br/>

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
                <br/><br/>

                <h3>Personal Details</h3>
                <hr>

                <span>First Name : </span>
                <input
                  class="form--text-box regi-box"
                  type="text"
                  name="user_firstName"
                  autocomplete="off"
                  required
                />
                <br/><br/>

                <span>Middle Name : </span>
                <input
                  class="form--text-box regi-box"
                  type="text"
                  name="user_middleName"
                  autocomplete="off"
                  required
                />
                <br/><br/>

                <span>Last Name : </span>
                <input
                  class="form--text-box regi-box"
                  type="text"
                  name="user_lastName"
                  autocomplete="off"
                  required
                />
                <br/><br/>

                <span>Suffix : </span>
                <input
                  class="form--text-box regi-box"
                  type="text"
                  name="user_suffix"
                  autocomplete="off"
                />
                <br/><br/>

                <span>Birthdate : </span>
                <input
                class="form--date-box"
                type="date"
                name="user_birthdate"
                required
                />
                <br/><br/>

                <span>Sex : </span>
                <select
                class="form--select"
                name="user_sex"
                required
                >
                  <option value="" disabled selected hidden>Select Sex</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <br/><br/>

                <span>Contact Number : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_contact"
                autocomplete="off"
                />
                <br/><br/>

                <span>Religion : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_religion"
                autocomplete="off"
                />
                <br/><br/>

                <span>Marital Status : </span>
                <select
                class="form--select"
                name="user_mariStat"
                required
                >
                  <option value="" disabled selected hidden>Select Marital Status</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Widowed">Widowed</option>
                </select>
                <br/><br/>

                <span>Current Address : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_curAddress"
                autocomplete="off"
                required
                />
                <br/><br/>

                <span>Permanent Address : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_permAddress"
                autocomplete="off"
                required
                />
                <br/><br/>

                <span>Provincial Address (if any) : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_provAddress"
                autocomplete="off"
                />
                <br/><br/>

                <span>Place of Birth : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_placeOfBirth"
                autocomplete="off"
                required
                />
                <br/><br/>

                <span>Nationality : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_nationality"
                autocomplete="off"
                required
                />
                <br/><br/>

                <h3>Family Details</h3>
                <hr>
                <span>Mother's Name : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_mother"
                autocomplete="off"
                required
                />
                <br/><br/>

                <span>Mother's Occupation : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_mother_occ"
                autocomplete="off"
                required
                />
                <br/><br/>

                <span>Mother's Birthdate : </span>
                <input
                class="form--date-box"
                type="date"
                name="user_mother_birthdate"
                required
                />
                <br/><br/>

                <span>Father's Name : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_father"
                autocomplete="off"
                required
                />
                <br/><br/>

                <span>Father's Occupation : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_father_occ"
                autocomplete="off"
                required
                />
                <br/><br/>

                <span>Father's Birthdate : </span>
                <input
                class="form--date-box"
                type="date"
                name="user_father_birthdate"
                required
                />
                <br/><br/>

                <span>Siblings : </span><br/>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_sibling1"
                autocomplete="off"
                /><br/>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_sibling2"
                autocomplete="off"
                /><br/>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_sibling3"
                autocomplete="off"
                /><br/>
                <br/>

                <span>Spouse : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_spouse"
                autocomplete="off"
                />
                <br/><br/>

                <span>Spouse's Occupation : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_spouse_occ"
                autocomplete="off"
                />
                <br/><br/>

                <span>Spouse's Birthdate : </span>
                <input
                class="form--date-box"
                type="date"
                name="user_spouse_birthdate"
                />
                <br/><br/>

                <span>Children : </span> <br/>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_child1"
                autocomplete="off"
                /><br/>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_child2"
                autocomplete="off"
                /><br/>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_child3"
                autocomplete="off"
                /><br/>
                <br/>

                <h3>Work Details</h3>
                <hr>

                <span>Work : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_work"
                />
                <br/><br/>

                <span>Company : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_company"
                />
                <br/><br/>

                <span>Work Address : </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_work_add"
                />
                <br/><br/>

                <span>Salary per Month: </span>
                <input
                class="form--text-box regi-box"
                type="text"
                name="user_work_salary"
                />
                <br/><br/>

                <div class="middle-button">
                  <input
                  class="form--submit-btn button"
                  type="submit"
                  name="register"
                  value="Register"
                  />
                </div>
                <br/>
                <br/>
            </form>
            <script src="../script/js/showPassword.js"></script>
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