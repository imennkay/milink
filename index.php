<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title></title>
</head>
<body>
    
<?php

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