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
  <title>Maths Topics</title>
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
  <div class="navbar">
  <ul>
  <li><a  href="homepage.php">Home</a></li>
  <li><a  href="#account">My Account</a></li>
  <li><a  href="contact.php">Contact</a></li>
  <li style="float:right"><a href="#help">Help</a></li>
  </ul>
</div>
<div class="mathsTopicInfo">
  <h3>Master your Maths!</h3>
  <p>Choose a Maths topic below that you would like
    to test your skills on or learn more about! </p>
</div>
<!--buttons for all different topics-->
<div class="mathsTopicBtns">
  <form method="get" action="activities.php">
      <button type="submit" name="numbers_btn" class="mathTopic-btn">  <img src="cubes.png" alt="numbers" class="topic1"><br><br><b>Number & Place Value</b><br></button>
      <button type="submit" name="addition_btn" class="mathTopic-btn">  <img src="quiz.png" alt="addition" class="topic2"><br><br><b>Addition & Subtraction</b><br></button>
      <button type="submit" name="multiplication_btn" class="mathTopic-btn">  <img src="division.png" alt="multiplication" class="topic3"><br><br><b>Multiplication & Division</b><br></button>
      <button type="submit" name="measurement_btn" class="mathTopic-btn">  <img src="ruler.png" alt="measurement" class="topic4"><br><br><b>Measurement</b><br></button>
      <button type="submit" name="fractions_btn" class="mathTopic-btn">  <img src="piechart.png" alt="fractions" class="topic5"><br><br><b>Fractions, Decimals & Percentages</b><br></button>
      <button type="submit" name="ratio_btn" class="mathTopic-btn">  <img src="aspect.png" alt="ratio" class="topic6"><br><br><b>Ratio & Proportion</b><br></button>
      <button type="submit" name="algebra_btn" class="mathTopic-btn">  <img src="algebra.png" alt="algebra" class="topic7"><br><br><b>Algebra</b><br></button>
      <button type="submit" name="geometry_btn" class="mathTopic-btn">  <img src="shapes.png" alt="geometry" class="topic8"><br><br><b>Geometry</b><br></button>
      <button type="submit" name="statistics_btn" class="mathTopic-btn"> <img src="analytics.png" alt="statistics" class="topic9"><br><br><b>Statistics</b><br></button>
    </form>
</div>
