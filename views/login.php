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
        header("location:loginform.php?err=$errors&message=$errorMessages");
        exit;
    }else{
          $userName = $_POST['username'];
        }

    if(empty($_POST['password'])){
        $errors = true;
        $errorMessages= "Password cannot be empty!";
        header("location:loginform.php?err=$errors&message=$errorMessages");
        exit;
    }else{
      $passWord = md5($_POST['password']);
    }

// if all above  requirements are filled, insert into database
        $sql= "SELECT name, password from users where username = '$userName' and password ='$passWord'";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':passWord', $passWord);
        $return=$stmt->execute();
        if(!$return){
        print_r($dbh->errorInfo());
        }else{
          $_SESSION['user_name']=$userName;
          $_SESSION['pass_word']=$passWord;
          echo "Login up sucess!";
          echo "<a href=\"../index.php\">Start nu</a>";
        }
  }
?>