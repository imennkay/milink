<?php

include("../includes/db.php");
print_r($_POST);


// $userName = (!empty($_POST['username']) ? $_POST['username'] : "");
// $userPassword = (!empty($_POST['password']) ? $_POST['password'] : "");


$userName = $_POST['username'];
$userPassword = md5($_POST['password']);
echo $userPassword;
$query= "SELECT username, password from users where username = '$userName' and password ='$userPassword'";

$return = $dbh->query($query);


$row = $return->fetch(PDO::FETCH_ASSOC);


 if (empty($row)){
     echo "You can not login";
    header("location:index.php?err=true");
 } else {
     session_start();
     $_SESSION ['user__name'] = $row['name'];
     $_SESSION ['user__password'] = $row['password'];
   
 }

?>