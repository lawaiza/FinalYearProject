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
  <title>Contact Us</title>
</head>
<body>
  <!--Header class that welcomes the user, htmlspecialchars function converts special characters to HMTL entities and prevents HTML injections-->
  <div class="header">
    <img src="logo.png" alt="MathsLogo" class="homepagelogo">
    <h1>Get in touch <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    <a href="#" class="previous" onclick="javascript:window.history.back(-1);return false;">&#8249;</a>


  </div>

<div class="contactText">
  <h6>We can help you!</h6>
  <p> If you need any assistance, please email any queries to <span class="red_text">180032419@aston.ac.uk</span> with <span class="red_text">your username</span> and we will be in touch as soon as possible!</p>
