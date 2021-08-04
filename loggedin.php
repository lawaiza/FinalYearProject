<!--PHP code for login button-->
<?php
// Creates/resumes a session
session_start();
//if the login button is clicked, then it connects to the database
if (isset($_POST['login_btn'])){
  require 'dbConnector.php';
  //removes the escape characters in the input string to protect against SQL injections
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $checkPassword = mysqli_real_escape_string($con, $_POST['password']);

  //checks if the username and password are not empty
  if($username != "" && $checkPassword != ""){
    $checkPassword = md5($checkPassword); //hashes password

    //checks if the entered information matches that of the credentials in the users table in the database
    $query = " select * from users where username='".$username."' and password='".$checkPassword."'";
    $result = mysqli_query($con,$query);
    //checks all records in user table
    $row = mysqli_num_rows($result);
    //if a successful match is found, then save the username in the current session and redirect to the logged in page
    if($row== 1){
      $_SESSION['username'] = $username;
      echo "<script>location.href='homepage.php'</script>";
    }else {
      //if no match in database, error message shown and redirected to landing page
      echo '<script>alert("Username/password incorrect")</script>';
      echo "<script>location.href='index.php'</script>";
    }
  }
  //close database connection
  mysqli_close($con);
}
?>
