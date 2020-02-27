<?php
include("classes/comments.class.php");

$postId=$_GET['postId'];

$singlePostObj=new Posts($dbh);
$singlePostObj->fetchSinglePost($postId);
$title="";

  foreach($singlePostObj->getSinglePost() as $post){
    echo "<div class=\"singlepost\">";
      echo "<div class=\"card\" style=\"width: 80%;\">";
        echo "<div class=\"card-body\">";
          echo "<h5 class=\"card-title\">".$post['title']."</h5>";
      //  $title=$post['tilte'];
          echo "<p class=\"card-text\">".$post['description']."</p>";
       echo "</div>";
      echo "</div>";
    echo "</div>";
  }

  // create comment object and show all the comments to the post
  $commentObj=new Comments($dbh);
  $commentObj->fetchAll($postId);
  foreach($commentObj->getComments() as $comment){
     echo $comment['content']."<br>";
     echo $comment['created_date']."<br>";
  }
  
   //if user doesn't login show login länk, if useer login show comment form.
    if(isset($_SESSION['user__name'])){
       include("commentform.php");
    }else{
           echo "<div class=\"comment\">";
           echo  "<p><a href=\" index.php?page=login&postId=".$postId."\">Login</a> to leave a comment!</p>";
           echo  "</div>";
}

?>
