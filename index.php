<?php
session_start();
include("header.php");
include("includes/db.php");

// show different pages
$page = (isset($_GET['page']) ? $_GET['page'] : '');

if($page=="about"){
    include("views/about.php");
}elseif($page=="post"){
    include("views/searchform.php");
    include("views/post.php");
}elseif($page=="login"){
    include("views/loginform.php");
}elseif($page=="signup"){
    include("views/signupform.php");
}elseif($page=="logout"){
    include("views/logout.php");
}else{
    include("views/searchform.php");
    include("views/home.php");
    include("views/post.php");
}

// echo "<a class=\"showmore\" href=\"index.php?page=post\">Show more>></a>";
include("footer.php")
?>

</body>
</html>