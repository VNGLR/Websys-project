<?php

session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

echo 'You have logged out successfully<br><a href="welcome.php">welcome</a>';