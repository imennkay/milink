<?php 

//PHP SETTINGS
$host = "localhost";
$user = "root";
$pass = "";
$db = "milink";


// MAKE CONNECTION

try {
$dsn = "mysql:host=$host;dbname=$db;user=$user;pass=$pass";
$dbh = new PDO($dsn, $user, $pass);
} catch(PDOException $e) {
    echo "Error! ". $e->getMessage() ."<br />";
    die;
}





?>