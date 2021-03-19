<?php
//resumes current session and control of errors displayed to user
session_start();
error_reporting(0);
//PHP code for logout button and redirects to the logout file
if (isset($_POST['logout_btn'])){
  header("location: logout.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script defer src="script.js"></script>
<title>Practise Questions</title>
</head> <!--access to CSS style sheet-->
<body>
  <div class="header">
    <img src="logo.png" alt="MathsLogo" class="homepagelogo">
    <h1>Welcome <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    <!--Adds logout button on right hand side of header-->
    <a href="logout.php"><input type="button" class="logout-btn" id='logout' name="logout_btn" value="Log out"></a>
  </div>
  <div class="navbar">
  <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#account">My Account</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right"><a href="#help">Help</a></li>
  </ul>
  </div>
<div class="questionContainer">
  <div id="questions-container" class="hide">
    <div id="question">Question</div>
    <div id="answerBtn" class="btn-grid">
      <button class="btns">Answer 1</button>
      <button class="btns">Answer 2</button>
      <button class="btns">Answer 3</button>
      <button class="btns">Answer 4</button>
  </div>
</div>
  <div class="buttonControls">
    <button id="startBtn" class="start-btn btns">Start!</button>
    <button id="nextBtn" class="next-btn btns hide">Next</button>
</div>
</div>
</body>
