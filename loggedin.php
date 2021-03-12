<!--PHP code for login button-->
<?php
// Creates/resumes a session
session_start();

if (isset($_POST['login_btn'])){
  require 'dbConnector.php';
  //removes the escape characters in the input string to protect against SQL injections
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $checkPassword = mysqli_real_escape_string($con, $_POST['password']);

  //checks if the username and password are not empty
  if($username != "" && $checkPassword != ""){
    $checkPassword = md5($checkPassword); //hashes password

    //checks if the entered information matches that of the credentials in the users table in the database
    $query = " select count(*) as allUsers from users where username='".$username."' and password='".$checkPassword."'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    //checks all records in user table
    $count = $row['allUsers'];


    //if a successful match is found, then save the username in the current session and redirect to the logged in page
    if($count > 0){
      //echo "<script>location.href='homepage.php'</script>";
      $_SESSION['username'] = $username;
    //  echo '<script>alert("Welcome")</script>';
      echo "<script>location.href='homepage.php'</script>";
      //header('Location: homepage.php');
    }else {
      //header('Location: index.php');
      echo '<script>alert("Username/password incorrect")</script>';
      echo "<script>location.href='index.php'</script>";
    }
  }
  //close database connection
  mysqli_close($con);
}
?>
