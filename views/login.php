<?php
session_start();
include("../includes/db.php");

$errorMessages = "";
// check if the data from the login form was submitted
if(empty($_POST["username"])){
    $errorMessages= "Please fill the username!";
    header("location:../index.php?page=login&err=true&message=$errorMessages");
    exit;
}else {$userName=$_POST['username'];}
    
if(empty($_POST["password"])){
    $errorMessages= "Please fill the password!";
    header("location:../index.php?page=login&err=true&username=$userName&message=$errorMessages");
    exit;
}else {$userPassword=md5($_POST['password']);}


// check if username and password exists in database
$sql= "SELECT id, username, password, image FROM users where username=:userName";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':userName', $userName);
$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_ASSOC);
$userId=$data['id'];
$userImage=$data['image'];
$password=$data['password'];

if(!empty($data)){
   // Account exists, now we verify the password.
   if($userPassword==$password){
    // Verification success! User has loggedin!
        $_SESSION['user__image']=$userImage;
        $_SESSION['user__id'] = $userId;
        $_SESSION['user__name'] = $userName;
        if(isset($_GET['postId'])){
            header("location:../index.php?page=post&postId=" .$_GET['postId']);
        }else  header("location:../index.php");
   }else{
       $errorMessages= "Incorrect password!";
       header("location:../index.php?page=login&err=true&username=$userName&message=$errorMessages");
   }
}else{
    $errorMessages= "Incorrect username!";
    header("location:../index.php?page=login&err=true&username=$userName&message=$errorMessages");
    exit;
}
    
?>