<!--PHP code to initialise the connection between html and the database-->
<?php
$dbServer = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "fypmathsmastery";
$con = mysqli_connect($dbServer, $dbUser, "", $dbName);

if ($con==false) { //if database connection failed,show error
  die("ERROR: could not connect.".mysqli_connect_error());
}
?>
