<?php 

session_start();

unset($_SESSION['username']); // take out username key

header('Location: login.php'); // return to login page

?>