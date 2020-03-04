    <div class="comment-form">
        <?php 
        $postId=$_GET['postId'];
        echo "<p>".$_SESSION['user__name']."</p>";
        echo "<form action=\"views/comment.php?postId=" .$postId."\" method=\"POST\">";

        ?>
        <!-- <form action="comment.php" method="POST"> -->
            <textarea name="comment" id="" cols="30" rows="3" placeholder="Write your comment here!"></textarea><br>
            <input class="comment-btn" type="submit" name="submit" value="Publish">
         </form>
        
    </div>