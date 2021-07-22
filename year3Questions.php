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
<title>Practise Questions</title>
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
  <li><a  href="homepage.php">Home</a></li>
  <li><a  href="#account">My Account</a></li>
  <li><a  href="contact.php">Contact</a></li>
  <li style="float:right"><a href="#help">Help</a></li>
  </ul>
  </div>
<!--multiple choice quiz questions with score and timer-->
<div class="questionContainer">
  <div class="scoreContainer">Score :<span id="score" class="count"> 0</span></div>
  <div class="timerContainer">Time Left :<span id="time">10:00</span></div>
  <form id='form-result' class="hide" action="">
         <div class="SP-container">
           <div class="modal-text modal-text-bigger">DONE!</div>
           <div class="modal-text">Right answers:</div>

           <!-- 4. here's where we show right answers: span id="right-answers" -->
           <div class="modal-text"><span id="right-answers" class="count"> 12 </span> of <span id="all-questions" class="count">count-of-questions</span> (<span id="answers-percent"></span>%)</div>
         </div>
       </form>

  <div id="questions-container" class="hide">
    <div class="number-of-question-text">Question Number  <span id="current-question">YYY</span> of <span id="all-questions2">XXX</span></div>
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
