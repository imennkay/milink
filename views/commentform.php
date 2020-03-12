    <div class="comment-form">
        <?php 
        $postId=$_GET['postId'];
        $userId=$_SESSION['user__id'];
        $sql="select image from users where id=:userId";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        echo "<p><img class=\"user-image\" src=\"images/".$data['image']."\" alt=\"user image\"> ".$_SESSION['user__name']."</p>";
            
        echo "<form action=\"views/comment.php?postId=" .$postId."\" method=\"POST\">";

        ?>
        <!-- <form action="comment.php" method="POST"> -->
            <textarea name="comment" id="" cols="30" rows="3" placeholder="Write your comment here!"></textarea>
            <input class="comment-btn" type="submit" name="submit" value="Publish">
         </form>
        
    </div>