<?php

include("classes/comments.class.php");
$postId=$_GET['postId'];

$singlePostObj=new Posts($dbh);
$singlePostObj->fetchSinglePost($postId);
$title="";

  foreach($singlePostObj->getSinglePost() as $post){
    echo "<div class=\"singlepost\">";
      echo "<div class=\"card\">";
        echo "<div class=\"card-body\">";
            echo "<p class=\"card-head\">Created by ".$post['username']." on ".$post['created_date']. " | Last updated on " .$post['updated_date']. "</p>";
            echo "<h5 class=\"card-title\">".$post['title']."</h5>";
            echo "<p class=\"card-text\">".$post['description']."</p>";
        echo "</div>";
      echo "</div>";
    echo "</div>"; 
  }

  // create comment object and show all the comments to the post
  $commentObj=new Comments($dbh);
  $commentObj->fetchAll($postId);
  foreach($commentObj->getComments() as $comment){
     echo "<div class=\"comment-results-container\">";
     echo "<p><img class=\"user-image\" src=\"images/".$comment['image']."\" alt=\"user image\"> ".$comment['username']."</p>";
     echo "<p class=\"comment-date\">".$comment['created_date']. "</p>";
     echo "<div class=\"comment-results\">";
     echo $comment['content']." ";
     echo  "</div>";
     echo  "</div>";
  }
   //if user doesn't login show login länk, if useer login show comment form.
    if(isset($_SESSION['user__name'])){
       include("commentform.php");
    }else{
           echo "<div class=\"login-comment\">";
           echo  "<p><a href=\" index.php?page=login&postId=".$postId."\">Login</a> to leave a comment!</p>";
           echo  "</div>";
}

?>
