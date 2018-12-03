<?php

define('DB_USERNAME', 'id8098774_admin');
define('DB_PASSWORD', 'jackdaniels');
define('DB_NAME', 'id8098774_bookworms');
define('DB_SERVER', 'localhost');

/* Attempt to connect to MySQL database */
/** @var mysqli $mysqli */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Check connection
if($mysqli->connect_errno){
    die("ERROR: Could not connect. (" .$mysqli->connect_errno. ") " . $mysqli->connect_error);
}
 ?>