<?php
//resumes current session and control of errors displayed to user
session_start();
error_reporting(0);
//PHP code for logout button and redirects to the logout file
if (isset($_POST['logout_btn'])){
  header("location: logout.php");
}
?>
<!--HTML declaration and link to the style.css file and bootstrap framework to style elements
Javascript and boostrap imported links for the modal style-->
<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Activities</title>
</head>
<body>
  <!--Header class that welcomes the user, htmlspecialchars function converts special characters to HMTL entities and prevents HTML injections-->
  <div class="header">
    <img src="logo.png" alt="MathsLogo" class="homepagelogo">
    <h1>Master Maths Now <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
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
<div class="activitiesBtns">
  <button type="submit" name="examples_btn" class="activity-btn">  <img src="steps.png" alt="examples" class="activity1"> <br><br><b>Step-by-Step Examples</b><br></button>
  <button type="submit" name="questions_btn" class="activity-btn">  <img src="qa.png" alt="questions" class="activity2"><br><br><b>Practise Questions</b><br></button>
</div>
