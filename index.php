<?php

include("header.php");
include("includes/db.php");

session_start();
//echo (isset($_GET['err']) && $_GET['err'] == true ? "something went wrong!" : "");
// echo(isset($_SESSION['username']) ? "Welcome" . $_SESSION['username'] : '');
if(isset($_SESSION['user__name'])){
    echo "Hello!! " . $_SESSION['user__name'] . "!<br/>";
    echo '<a href = "views/logout.php">Log out!</a>';

}else {
    include ("views/home.php");
}

// show different pages
$page = (isset($_GET['page']) ? $_GET['page'] : '');

if($page=="about"){
    include("views/about.php");
}elseif($page=="post"){
    include("views/post.php");
}elseif($page=="login"){
    include("views/loginform.php");
}elseif($page=="signup"){
    include("views/signupform.php");
}else{
    include("views/home.php");
}

?>

</body>
</html>