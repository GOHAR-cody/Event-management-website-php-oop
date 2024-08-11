<?php
// Start the session
session_start();

// Clear all session variables
$_SESSION = array();
// Destroy the session
session_destroy();

// Redirect to the login page or home page
header("Location: login.php"); // Change 'login.php' to your login page or home page
exit();
?>
