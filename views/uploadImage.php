<?php
   session_start();
   include("../includes/db.php");
   include("../classes/comments.class.php");

   $userId=$_SESSION['user__id'];
   $target_dir = "../images/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   // Check if image file is a actual image or fake image
   if(isset($_POST["submit"])) {
       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
       if($check !== false) {
           $uploadOk = 1;
       } else {
           $errorMessages= "File is not an image.";
           header("location:../index.php?page=uploadImage&err=true&message=$errorMessages");
           exit;
       }
   }
   // Check file size
   if ($_FILES["fileToUpload"]["size"] > 500000) {
       $errorMessages= "Sorry, your file is too large.";
       header("location:../index.php?page=uploadImage&err=true&message=$errorMessages");
       exit;
   }
   // Allow certain file formats
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" ) {
       $errorMessages= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       header("location:../index.php?page=uploadImage&err=true&message=$errorMessages");
       exit;
   }
   // if all above requirements are filled then try to upload file and update user image
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $image=$_FILES["fileToUpload"]["name"];
        $sql="UPDATE users set image = :image where id = :userId";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':userId', $userId);
        $return=$stmt->execute();
        if(!$return){
        print_r($dbh->errorInfo());
        }else{
            $successMessage= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            header("location:../index.php?page=uploadImage&status=success&message=$successMessage");
        }
    } else {
        $errorMessages= "Sorry, there was an error uploading your file.";
        header("location:../index.php?page=uploadImage&err=true&message=$errorMessages");
        exit;}

?>