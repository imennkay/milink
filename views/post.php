<?php
include("includes/db.php");
include("classes/posts.class.php");

// show all the posts
if(isset($_GET['postId'])){
   include("views/singlepost.php");
}else{

// declare en new post object to get all posts
$postsObj = new Posts($dbh);
$postsObj->fetchAll();
  foreach($postsObj->getPosts() as $post){
   echo "<div class=\"post-session\">";
      echo "<div class=\"card mb-3\">";
        echo "<div class=\"row no-gutter\">";
          echo "<div class=\"col-md-5\">";
               echo "<img src=\"images/" .$post['image']. "\" class=\"card-img\" alt=\"image\">";
          echo "</div>";
          echo "<div class=\"col-md-7\">";
             echo "<div class=\"card-body\">";
                echo "<h5 class=\"card-title\">" .$post['title']. "</h5>";
                $string = strip_tags($post['description']);
                if (strlen($string)>300){
                    // truncate string
                    $stringCut=substr($string, 0, 350);
                    $endPoint=strrpos($stringCut, '');
                    //if the string doesn't contain any space then it will cut without word basis.
                    $string = $endPoint? substr($stringCut, 0, $endPoint) :substr($stringCut, 0);
                  //   $string .='...<a href="views/singlepost.php?postId=' .$post['id'].'">Read More</a>';
                  $string .='...<a href="index.php?page=post&postId=' .$post['id'].'">Read More</a>';
                }
                echo "<p class=\"card-text\">" .$string. "</p>";
                echo "<p class=\"card-text\"><small class=\"text-muted\">" .$post['created_date']. "</small></p>";
             echo "</div>";
          echo "</div>";
         echo "</div>";
       echo "</div>";
   echo "</div>";
  }
}
?>



