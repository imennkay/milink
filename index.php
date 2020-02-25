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


session_start();
//echo (isset($_GET['err']) && $_GET['err'] == true ? "something went wrong!" : "");
// echo(isset($_SESSION['user__name']) ? "Welcome" . $_SESSION['user__name'] : '');
if (isset($_GET['err']) && $_GET['err'] == true){
echo "you are a new user!";

}

elseif (isset($_SESSION['user__name'])){

    echo "Hej " . $_SESSION['user__name'] . "!<br/>";
    echo '<a href = "logout.php">Logga ut!</a>';

}else {
    include ("views/loginform.php");
}

?>



</body>
</html>