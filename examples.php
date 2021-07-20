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
<link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="style.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script defer src="script.js"></script>
<title>Step by step examples</title>
</head> <!--access to CSS style sheet-->
<body>
  <div class="header">
    <img src="logo.png" alt="MathsLogo" class="homepagelogo">
    <h1>Master Maths Now <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    <a href="#" class="previous" onclick="javascript:window.history.back(-1);return false;">&#8249;</a>
    <!--Adds logout button on right hand side of header-->
    <a href="logout.php"><input type="button" class="logout-btn" id='logout' name="logout_btn" value="Log out"></a>
  </div>
  <div class="navbar">
  <ul>
  <li><a class="active" href="homepage.php">Home</a></li>
  <li><a href="#account">My Account</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right"><a href="#help">Help</a></li>
  </ul>
  </div>
  <div class="exampleContainer">
    <h4>NUMBER & PLACE VALUE EXAMPLE</h4>
    <h5> Question: Fill in the missing numbers.</h5>
  <img src="example.png" alt="numExample" class="example1">
  <p>So the above image shows 3 three-digit numbers and we have to find the other 4 numbers.<br>
  <span class="red_text">STEP 1</span> - We know they are three-digit numbers as in each box, there are 3 digits - <span class="pink_text">Hundreds</span>, <span class="green_text">Tens</span> and <span class="lilac_text">Units</span>.<br>
  Let's look at the first number 362 - We know this number is made up of <span class="pink_text">3 Hundreds</span>, <span class="green_text">6 Tens</span> and <span class="lilac_text">2 Units</span> which is
  three hundred and sixty-two!<br>
  <span class="red_text">STEP 2</span> - Let's look at the difference between all 3 numbers given: to get from 362 to 372, we have to count 10 more (<span class="blue_text">362 + 10 = 372</span>).<br> Is this the same
  between 372 and 382? Yes! You also need to count 10 more (<span class="blue_text">372 + 10 = 382</span>)!<br>
  So now we have found a pattern! This pattern will help us find the next numbers by counting 10 more!<br>
  <span class="red_text">STEP 3</span> - the last number we were given is 382 so we need to repeat the pattern: we know that we need to count 10 more so <span class="blue_text">382 + 10 = 392</span>. We have found one new number!<br>
  <span class="red_text">STEP 4</span> - We repeat this every time with the new number until we get all 4 new numbers and fill the grid! You try it and see if your answers match below!<br>
  Did you get it right?<br>
  <span class="blue_text">392 + 10 = 402</span>!<br>
  <span class="blue_text">402 + 10 = 412</span>!<br>
  <span class="blue_text">412 + 10 = 422</span>!<br>
  So the filled in grid should look like:</p>
  <img src="answer.png" alt="numExample" class="example2">




</div>
