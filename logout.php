<?php
//Resumes the current session and destroys it
session_start();
session_destroy();
//Frees the username session variable
unset($_SESSION['username']);
//Redirects to index page
echo "<script>location.href='index.php'</script>";
?>
