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
  <title>HomePage</title>
</head>
<body>
  <!--Header class that welcomes the user, htmlspecialchars function converts special characters to HMTL entities and prevents HTML injections-->
  <div class="header">
    <img src="logo.png" alt="MathsLogo" class="homepagelogo">
    <h1>Welcome <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
          <!--next icon button to go forward-->
        <a href="#" class="next" onclick="history.forward();">&#8250;</a>
    <!--Adds logout button on right hand side of header-->
    <a href="logout.php"><input type="button" class="logout-btn" id='logout' name="logout_btn" value="Log out"></a>
  </div>
  <!--navigation bar to group HTML links in one place using lists-->
  <div class="navbar">
  <ul>
  <li><a  href="homepage.php">Home</a></li>
  <li><a href="#account">My Account</a></li>
  <li><a  href="contact.php">Contact</a></li>
  <li style="float:right"><a href="#help">Help</a></li>
  </ul>
</div>
<!--Written description instruction for users-->
<div class="yearGroupInfo">
  <h3>What year group are you in?</h3>
  <p>To help you with your Maths journey,
    please select what year group you are in:</p>
</div>
<!--Buttons for different year groups-->
<div class="yearGroupBtns">
  <form method="get" action="mathsTopics.php">
      <button type="submit" name="year3_btn" class="yearGroup-btn"><b>YEAR 3</b></button><br>
      <button type="submit" name="year4_btn" class="yearGroup-btn"><b>YEAR 4</b></button><br>
      <button type="submit" name="year5_btn" class="yearGroup-btn"><b>YEAR 5</b></button><br>
      <button type="submit" name="year6_btn" class="yearGroup-btn"><b>YEAR 6</b></button><br>
  </form>
</div>
