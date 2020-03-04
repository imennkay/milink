<?php
  session_start();
  include("../includes/db.php");

// check if submit button has been clicked
if(isset($_POST["submit"])){
    $errors = false;
    $errorMessages = "";

    // check if username is empty
    if(empty($_POST["username"])){
        $errors = true;
        $errorMessages= "Name cannot be empty!";
        header("location:../index.php?page=signup&err=$errors&message=$errorMessages");
        exit;
    }else{
          $userName = $_POST['username'];
          $sql="select username, created_date from users where username=:userName";
          $stmt=$dbh->prepare($sql);
          $stmt->bindParam(':userName', $userName);
          $stmt->execute();
          $data=$stmt->fetch(PDO::FETCH_ASSOC);
          if(!empty($data)){
          $errors = true;
          $errorMessages= "Username has been occupied. Please choose a new one.";
          header("location:../index.php?page=signup&err=$errors&message=$errorMessages&username=$userName");
          exit;
        }
    }
    // checi if email is empty and occupied
    if(empty($_POST["email"])){
      $errors = true;
      $errorMessages= "Please type your email!";
      header("location:../index.php?page=signup&err=$errors&message=$errorMessages");
      exit;
  }else{
        $eMail = $_POST['email'];
        $sql="select email, created_date from users where email=:eMail";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':eMail', $eMail);
        $stmt->execute();
        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($data)){
        $errors = true;
        $errorMessages= "Email has been occupied. Please choose a new one.";
        header("location:../index.php?page=signup&err=$errors&message=$errorMessages&username=$userName&email=$eMail");
        exit;}
      }
    // check if password is empty
    if(empty($_POST['password'])){
        $errors = true;
        $errorMessages= "Password cannot be empty!";
        header("location:../index.php?page=signup&err=$errors&message=$errorMessages&username=$userName&email=$eMail");
        exit;
    }else{
      $passWord1 = md5($_POST['password']);
    }
    

    if(empty($_POST['password_confirm'])){
      $errors = true;
      $errorMessages= "Confirm password cannot be empty!";
      header("location:../index.php?page=signup&err=$errors&message=$errorMessages&username=$userName&email=$eMail");
      exit;
    }else{
      $passWord2 = md5($_POST['password_confirm']);
    }

    if($_POST['password'] != $_POST['password_confirm']){
        $errors = true;
        $errorMessages= "Password are not the same!";
        header("location:../index.php?page=signup&err=$errors&message=$errorMessages&username=$userName&email=$eMail");
        exit;
    }

// if all above  requirements are filled, insert into database
        $sql="Insert into users(username, email, password) values(?, ?, ?)";
        $stmt=$dbh->prepare($sql);
        $return=$stmt->execute([$userName, $eMail, $passWord1]);
        if(!$return){
        print_r($dbh->errorInfo());
        }else{
          $_SESSION['user_name']=$userName;
          $_SESSION['e_mail']=$eMail;
          $_SESSION['pass_word']=$passWord1;
          $_SESSION['e_mail']=$eMail;
          header("location:../index.php?page=login");
        }
  }
?>