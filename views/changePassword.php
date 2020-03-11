<?php
   session_start();
   include("../includes/db.php");
   include("../classes/comments.class.php");


   $userId=$_SESSION['user__id'];
   if(isset($_POST["submit"])){
    $errors = false;
    $errorMessages = "";

        // check if original password is empty
        if(empty($_POST["old_password"])){
           $errors = true;
           $errorMessages= "Original Password cannot be empty!";
           header("location:../index.php?page=changePassword&err=$errors&message=$errorMessages");
           exit;
        }else{
          $oldPassword = md5($_POST['old_password']);
          $sql="select password from users where id=:userId";
          $stmt=$dbh->prepare($sql);
          $stmt->bindParam(':userId', $userId);
          $stmt->execute();
          $data=$stmt->fetch(PDO::FETCH_ASSOC);
          if($data['password']!=$oldPassword){
            $errors = true;
            $errorMessages= "Original Password is incorrect!";
            header("location:../index.php?page=changePassword&err=$errors&message=$errorMessages");
            exit;
            }
        }
    // check if new password is empty
    if(empty($_POST['new_password'])){
        $errors = true;
        $errorMessages= "New Password cannot be empty!";
        header("location:../index.php?page=changePassword&err=$errors&message=$errorMessages");
        exit;
    }else{
      $passWord1 = md5($_POST['new_password']);
    }
    
   // check if confirmed password is empty
    if(empty($_POST['new_password_confirmed'])){
      $errors = true;
      $errorMessages= "Confirmed new password cannot be empty!";
      header("location:../index.php?page=changePassword&err=$errors&message=$errorMessages");
      exit;
    }else{
      $passWord2 = md5($_POST['new_password_confirmed']);
    }
    // check if password and confirmed password are matched
    if($passWord1 !== $passWord2){
        $errors = true;
        $errorMessages= "Password are not the same!";
        header("location:../index.php?page=changePassword&err=$errors&message=$errorMessages");
        exit;
    }
    if($passWord1==$oldPassword){
        $errors = true;
        $errorMessages= "New password cannot be the same as original password!";
        header("location:../index.php?page=changePassword&err=$errors&message=$errorMessages");
        exit;

    }
    // if all above  requirements are filled, update password
    $sql="UPDATE users set password = :passWord1 where id = :userId";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(':passWord1', $passWord1);
    $stmt->bindParam(':userId', $userId);
    $return=$stmt->execute();
    if(!$return){
    print_r($dbh->errorInfo());
    }else{
        header("location:../index.php?page=changePassword&status=success");
    }
}

?>