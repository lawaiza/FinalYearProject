<?php
// Creates/resumes a session
session_start();

//PHP code for the register form when register button is clicked,
//uses database connection and removes escaped characters in each
//input string to prevent SQL injection
if (isset($_POST['signup_btn'])){
  require 'dbConnector.php';
  $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $password2 = mysqli_real_escape_string($con, $_POST['password2']);
  //Checks if the 2 passwords the user entered match
  if ($password == $password2){
    //If they do, the password is hashed and query executed to select the email and username they have inputted
    $password = md5($password);
    $sqlValidation = "SELECT * FROM `users` WHERE  `username`='".$username."' OR `email`='".$email."'";
    $result = mysqli_query($con, $sqlValidation);
    //if there is already a record with the same username or email, they cannot use the same details and asked to try again,redirecting them to index page
    if (mysqli_num_rows($result) >= 1){
      echo '<script>alert("Username or email address already exists, Please try again")</script>';
      echo "<script>location.href='index.php'</script>";
    }else{
      //executes query to insert all register data inputs into the corresponding fields in the users table
      $sqlInsert = "INSERT INTO users(userID,firstName, lastName, email, username, password) VALUES(NULL,'$firstName','$lastName','$email','$username','$password')";
      mysqli_query($con,$sqlInsert);

      //Alert message that their account has been created and redirects them to the index page
      echo '<script>alert("Your account have succesfully been created, you can now log in!")</script>';
      echo "<script>location.href='homepage.php'</script>";
      $_SESSION['username'] = $username;
    }
  }else{
    //Alerts the user that their two passwords do not match, redirects to index page
    echo '<script>alert("The two passwords do not match, please try again")</script>';
    echo "<script>location.href='index.php'</script>";
  }
  //closes database connection
  mysqli_close($con);
}
?>
