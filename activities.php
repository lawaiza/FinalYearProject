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
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Activities</title>
</head>
<body>
  <!--Header class that welcomes the user, htmlspecialchars function converts special characters to HMTL entities and prevents HTML injections-->
  <div class="header">
    <img src="logo.png" alt="MathsLogo" class="homepagelogo">
    <h1>Master Maths Now <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    <a href="#" class="previous" onclick="javascript:window.history.back(-1);return false;">&#8249;</a>
  <a href="#" class="next" onclick="history.forward();">&#8250;</a>
    <!--Adds logout button on right hand side of header-->
    <a href="logout.php"><input type="button" class="logout-btn" id='logout' name="logout_btn" value="Log out"></a>
  </div>
  <!--creates a navigation bar -->
  <div class="navbar">
  <ul>
  <li><a href="homepage.php">Home</a></li>
  <li><a  href="#account">My Account</a></li>
  <li><a  href="contact.php">Contact</a></li>
  <li style="float:right"><a href="#help">Help</a></li>
  </ul>
</div>
<!--creates buttons which direct to the corresponding webpage-->
<div class="activitiesBtns1">
  <form method="get" action="examples.php">
    <button type="submit" name="examples_btn" class="activity-btn1">  <img src="steps.png" alt="examples" class="activity1"> <br><br><b>Step-by-Step Examples</b><br></button></form>
</div>
<div class="activitiesBtns2">
  <form method="get" action="year3Questions.php">
    <button type="submit" name="questions_btn" class="activity-btn2">  <img src="qa.png" alt="questions" class="activity2"> <br><br><b>Practise Questions</b><br></button></form>
</div>
