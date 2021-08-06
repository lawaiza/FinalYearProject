<?php
//access the session data before any session data is created or accessed.
session_start();
?>
<!--html code for the styling and functions of the landing page-->
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
<title>Landing Page</title>
<body>

  <!--Header container for the website's landing page with title,
  contact button and logo inside it-->
  <div class="header">
    <img src="logo.png" alt="MathsLogo" class="logo">
    <h1><b>Master Maths Now!</b></h1>
      <!--Adds contact button on right hand side of header-->
      <a  href="contact.php"><input type="button" class="contact-btn" id='contact' name="contact_btn" value="Contact Us"></a>
  </div>
  <!--Information container about purpose of web application-->
<div class="websiteInfo">
  <!--span tag allows for certain text to change colours, br tag
   used to separate text onto a new line-->
  <h2>What is 'Master Maths Now'?</h2>
  <p>Master Maths Now is an online Maths tool to help Key Stage 2<br>
     students improve their maths skills online by practising different
     questions from a range of maths topics to help them<br>
     become confident mathematicians. We offer:
  <ul>
    <!--list used to show bullet pointed text-->
    <li><span class="red_text">STEP-BY-STEP MATHS EXAMPLES AND EXPLANATIONS</span></li>
    <li><span class="green_text">LOTS OF PRACTISE QUESTIONS</span></li>
    <li><span class="pink_text">ABILITY TO TRACK STUDENT PROGRESS</span></li>
    <li><span class="blue_text">FUN GAMES & REWARDS</span></li>
  </ul>
  <br>
  So sign up today to get started on your maths journey!</p>
</div>

<!--create sign up and log in forms-->
<div class="container">
  <div class="formBox">
  <div class="buttonBox">
    <div id="btn"></div>
    <!--onclick used to hide one form when the other is displayed-->
    <button type="button" class="toggle-btn" onclick="login()"><b>LOG IN</b></button>
    <button type="button" class="toggle-btn" onclick="signup()"><b>SIGN UP</b></button>
  </div>
  <form method="post" action="loggedin.php" id="login" class="input-group">
    <input type="text" name="username" class="textInput" placeholder="Username" required>
    <input type="password" name="password" class="textInput" placeholder="Enter Password" required>
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
<!--JS to style switching between responsive form box-->
<script>
//gets each element
var x = document.getElementById("login");
var y = document.getElementById("signup");
var z = document.getElementById("btn");
function signup(){
  //moves the position of the form if that button is clicked
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
