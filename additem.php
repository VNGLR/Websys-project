<?php
echo " Thank you! Your book was added!";
echo "<br><a href='useraccount.php'>Go back</a>";
//defenition of user,db etc.

session_start();
$u = $_SESSION['username'];
$v1=$_POST["value1"];
$v2=$_POST["value2"];
$v3=$_POST["value3"];
$v4=$_POST["value4"];
$v5=$_POST["value5"];

require './config.php';
// the database and tables to create
$dbname = DB_NAME;
$host=DB_SERVER;
$db = DB_NAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;
// specific user for this particular database

 
try{
$dsn = "mysql:host=$host;dbname=$db";
$dbh = new PDO($dsn, $username, $password);

 $insertion = <<<EOSQL
INSERT INTO books (id, title, isbn, owner, current, author, genre, location)
VALUES ('0','$v1','$v2','$u','$u', '$v3', '$v4', '$v5');
EOSQL;
 
 $r = $dbh->exec($insertion);
}catch (PDOException $e){
 echo $e->getMessage();
}

?>


