<?php

include("../includes/db.php");

// $userName = (!empty($_POST['username']) ? $_POST['username'] : "");
// $userPassword = (!empty($_POST['password']) ? $_POST['password'] : "");


if(isset($_POST["submit"])){
    $errorMessages = "";

    // check if username is empty
    if(empty($_POST["username"])){
        $errorMessages= "Name cannot be empty!";
        header("location:../index.php?page=login&err=true&message=$errorMessages");
        exit;
    }else{     
        $userName = $_POST['username'];
    }

    if(empty($_POST['password'])){

        $errorMessages= "Password cannot be empty!";
        header("location:../index.php?page=login&err=true&message=$errorMessages");
        exit;
    }else{
        $userPassword = md5($_POST['password']);
    }

    $query= "SELECT username, password from users where username = '$userName' and password ='$userPassword'";

    $return = $dbh->query($query);

    $row = $return->fetch(PDO::FETCH_ASSOC);  

    if(empty($row)){
        $errorMessages= "You haven't signup!";
        header("location:../index.php?page=login&err=true&message=$errorMessages");
    }else{
        session_start();
        $_SESSION['user__name'] = $_POST['username'];
        $_SESSION['user__password'] = $_POST['password'];
        header("location:../index.php");
    }
}


?>