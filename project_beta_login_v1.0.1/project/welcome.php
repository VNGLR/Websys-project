<?php

session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
}
else {
	echo $_SESSION['username'];
	echo '<br><a href="logout.php">logout</a>';
    exit;
}