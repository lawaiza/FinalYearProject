

<?php
//access the session data before any session data is created or accessed.
session_start();

?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="style.css"></head> <!--access to CSS style sheet-->
<title>Landing Page</title>
<body>



  <!--Header for the webisites landing page with title inside it-->
  <div class="header">
    <img src="logo.png" alt="MathsLogo" class="logo">
    <h1><b>Master Maths Now!</b></h1>
  </div>
<div class="websiteInfo">
  <h2>What is 'Master Maths Now'?</h2>
  <p>Master Maths Now is an online Maths tool to help Key Stage 2<br>
     students improve their maths skills online by practising different<br>
     questions from a range of maths topics to help them<br>
     become confident mathematicians. We offer:
  <ul>
    <li>STEP-BY-STEP MATHS EXAMPLES AND EXPLANATIONS</li>
    <li>LOTS OF PRACTISE QUESTIONS</li>
    <li>ABILITY TO TRACK STUDENT PROGRESS</li>
    <li>FUN GAMES & REWARDS</li>
  </ul>
  <br>
  So sign up today to get started on your maths journey!</p>
</div>

<div class="container">
  <div class="formBox">
  <div class="buttonBox">
    <div id="btn"></div>
    <button type="button" class="toggle-btn" onclick="login()"><b>LOG IN</b></button>
    <button type="button" class="toggle-btn" onclick="signup()"><b>SIGN UP</b></button>
  </div>
  <form method="post" action="loggedin.php" id="login" class="input-group">
    <input type="text" name="username" class="textInput" placeholder="Username" required>
    <input type="password" name="password" class="textInput" placeholder="Enter Password" required>
    <input type="checkbox" class="checkBox"><span>Remember Me</span>
    <button type="submit" name="login_btn" class="login-btn"><b>LOG IN!</b></button>
  </form>
  <form method="post" action="signup.php" id="signup" class="input-group">
    <input type="text" name="firstName" class="textInput" placeholder="First name" required>
    <input type="text" name="lastName" class="textInput" placeholder="Last name" required>
    <input type="email" name="email" class="textInput" placeholder="Email address" required>
    <input type="text" name="username" class="textInput" placeholder="Username" required>
    <input type="password" name="password" placeholder="Enter Password" pattern="^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{8,}$" title="(Password must contain at least one letter, one number and be at least 8 characters long)"class="textInput" required>
    <input type="password" name="password2" placeholder="Re-enter Password" pattern="^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{8,}$" title="(Password must contain at least one letter, one number and be at least 8 characters long)"class="textInput" required>
    <button type="submit" name="signup_btn" class="signup-btn"><b>SIGN UP!</b></button>
  </form>

</div>
</div>
<script>
var x = document.getElementById("login");
var y = document.getElementById("signup");
var z = document.getElementById("btn");
function signup(){
  x.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "110px";
}
function login(){
  x.style.left = "50px";
  y.style.left = "450px";
  z.style.left = "0px";
}
</script>

</body>
