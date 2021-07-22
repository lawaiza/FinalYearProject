

<?php
//access the session data before any session data is created or accessed.
session_start();

?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
  <script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script></head> <!--access to CSS style sheet-->
<title>Landing Page</title>
<body>

  <!--Header for the webisites landing page with title inside it-->
  <div class="header">
    <img src="logo.png" alt="MathsLogo" class="logo">
    <h1><b>Master Maths Now!</b></h1>
      <!--Adds logout button on right hand side of header-->
      <a  href="contact.php"><input type="button" class="contact-btn" id='contact' name="contact_btn" value="Contact Us"></a>
  </div>
  <!--Info about purpose of web application-->
<div class="websiteInfo">

  <h2>What is 'Master Maths Now'?</h2>
  <p>Master Maths Now is an online Maths tool to help Key Stage 2<br>
     students improve their maths skills online by practising different<br>
     questions from a range of maths topics to help them<br>
     become confident mathematicians. We offer:
  <ul>
    <li><span class="red_text">STEP-BY-STEP MATHS EXAMPLES AND EXPLANATIONS</span></li>
    <li><span class="green_text">LOTS OF PRACTISE QUESTIONS</span></li>
    <li><span class="pink_text">ABILITY TO TRACK STUDENT PROGRESS</span></li>
    <li><span class="blue_text">FUN GAMES & REWARDS</span></li>
  </ul>
  <br>
  So sign up today to get started on your maths journey!</p>
</div.
<!--text-to-speech functionality
    <input type="button" onclick="textSpeak()" value="submit">
    <script>
    //JS to replace HTML tags with blank space when info is read out loud
    function RemoveHTML( text )
    {
       var regEx = /<[^>]*>/g;
        return text.replace(regEx, "");
    }
    function textSpeak(){
      var text=document.getElementById('txt').value;
      text=RemoveHTML(text);
      responsiveVoice.speak(text);

    }
    </script>
</div>
<!--create sign up and log in form box-->
<div class="container">
  <div class="formBox">
  <div class="buttonBox">
    <div id="btn"></div>
    <button type="button" class="toggle-btn" onclick="login()"><b>LOG IN</b></button>
    <button type="button" class="toggle-btn" onclick="signup()"><b>SIGN UP</b></button>
  </div>
  <form method="post" action="loggedin.php" id="login" class="input-group">
    <input type="text" name="username" class="textInput" placeholder="Username" required>
    <input type="password" name="password" class="textInput" placeholder="Enter Password" required>
  <!--  <input type="checkbox" class="checkBox"><span>Remember Me</span>-->
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
var x = document.getElementById("login");
var y = document.getElementById("signup");
var z = document.getElementById("btn");
function signup(){
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
<!--if(isset($_POST['submit'])){
  $txt=$_POST['txt'];
  $txt=htmlspecialchars($txt);
  $txt=rawurlencode($txt);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en');
  $player="<audio controls='controls' autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
  echo $player;
}
?>
<form method="post">
<input id="txt" name="txt" type="textbox" />
<input name="submit" type="submit" value="Convert to speech" /></form>
</body>
