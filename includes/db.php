<?php 
<<<<<<< HEAD
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

=======

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





>>>>>>> 33bc8895e02d0ac19212b784e79b8209a513b831
?>