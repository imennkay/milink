<?php
   session_start();
   include("../includes/db.php");
   include("../classes/comments.class.php");


   print_r($_POST);
   
   if(isset($_POST['submit'])){
      $postId=$_GET['postId'];
      $content=$_POST['comment'];
      $userId=$_SESSION['user__id'];
      // create a comment object
      $commentObj=new Comments($dbh);
      // insert comment in database
      $commentObj->setComment($postId, $userId, $content);
      header("location:../index.php?page=post&postId=" .$_GET['postId']);
   }
   
?>