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


if(isset($_POST["submit"])){
    $errors = false;
    $errorMessages = "";

    // check if username is empty
    if(empty($_POST["username"])){
        $errors = true;
        $errorMessages= "Name cannot be empty!";
        header("location:loginform.php?err=$errors&message=$errorMessages");
        exit;
    } else {
        session_start();
     $_SESSION ['user__name'] = $row['username'];
     header("location:../index.php");
     
 }

}

if(empty($_POST['password'])){
    $errors = true;
    $errorMessages= "Password cannot be empty!";
    header("location:loginform.php?err=$errors&message=$errorMessages");
    exit;
}else{
    session_start();
    $_SESSION ['user__password'] = $row['password'];
}
header("location:../index.php");

?>