<?php 
$host = "localhost";
$user = "root";
$pass = "cfc619619";
$db = "milink";


try{
    $dsn = "mysql:host=$host; dbname=$db;";
    $dbh = new PDO($dsn, $user, $pass);

} catch (PDOException $e){
    echo "Error! ". $e->getMessage() . "<br/>";
    die;
}

?>