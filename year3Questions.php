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
<!--HTML declaration and link to the style.css file and bootstrap framework to style elements
Javascript and boostrap imported links for the modal style-->
<head>
<link rel = "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="style.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--defer so it is loaded after the body tag-->
<script defer src="script.js"></script>
<title>Practise Questions</title>
</head>
<body>
    <!--Header class that welcomes the user, htmlspecialchars function converts special characters to HMTL entities and prevents HTML injections-->
  <div class="header">
    <img src="logo.png" alt="MathsLogo" class="homepagelogo">
    <h1>Master Maths Now <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
      <!--previous icon button to go back-->
    <a href="#" class="previous" onclick="javascript:window.history.back(-1);return false;">&#8249;</a>
    <!--Adds logout button on right hand side of header-->
    <a href="logout.php"><input type="button" class="logout-btn" id='logout' name="logout_btn" value="Log out"></a>
  </div>
  <!--navigation bar to group HTML links in one place using lists-->
  <div class="navbar">
  <ul>
  <li><a  href="homepage.php">Home</a></li>
  <li><a  href="#account">My Account</a></li>
  <li><a  href="contact.php">Contact</a></li>
  <li style="float:right"><a href="#help">Help</a></li>
  </ul>
  </div>
<!--JS multiple choice quiz questions with score and timer-->
<div class="questionContainer">
  <!--score is set to 0 and timer set to 10 minutes-->
  <div class="scoreContainer">Score :<span id="score"> 0</span></div>
  <div class="timerContainer">Time Left :<span id="time">10:00</span></div>
  <!--result section is hidden when quiz starts-->
  <form id='resultForm' class="hide" action="">
         <div class="resultContainer">
           <!--allows for bigger and smaller text in container-->
           <div class="modal-text modal-text-bigger" id="modalBig">WELL DONE!</div>
           <div class="modal-text" id="modalSmall">Correct answers:</div>
           <!-- shows correct answers out of total question number and as percentage -->
           <div class="modal-text">You got <span id="rightAnswers"> 2 </span> of <span id="allQuestions" >num-of-questions</span> (<span id="answersPercentage"></span>%) questions right!</div>
         </div>
       </form>
<!--contains multiple choice buttons and questions-->
  <div id="questions-container" class="hide">
    <div class="number-of-question-text">Question Number  <span id="current-question">YYY</span> of <span id="allQuestions2">XXX</span></div>
    <div id="question">Question</div>
    <div id="answerBtn" class="btn-grid">
      <button class="btns">Answer 1</button>
      <button class="btns">Answer 2</button>
      <button class="btns">Answer 3</button>
      <button class="btns">Answer 4</button>
  </div>
</div>
<!--contains start button, next button, submit and reset button-->
  <div class="buttonControls">
    <button id="startBtn" class="start-btn btns">Start!</button>
    <button id="nextBtn" class="next-btn btns hide">Next</button>
    <button id="submittedBtn" class="submitted-btn btns hide">Submit</button>
</div>
</div>
</body>
