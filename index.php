<?php

include("header.php");
include("includes/db.php");

if(isset($_GET['page']) && $_GET['page']="about.php"){
    include("views/about.php");
}
if(isset($_GET['page']) && $_GET['page']="signupform.php"){
    include("views/signupform.php");
}





// $postsObj = new Posts($dbh);
// $postsObj->fetchAll();
// foreach($postsObj->getPosts() as $post){
//     echo "<div><p class=postlist>";
//     echo "<b>Title</b>: " .$post['title']. "<br>";
//     echo "<b>Description</b>:" .$post['description']. "<br>";
//     echo "<b>Postat:</b>" .$post['created_date']. "<br>";
//     echo "</p></div>";
// }

?>



</body>
</html>