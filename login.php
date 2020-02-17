<?php
 
 include("header.php");


?>

<form action="handleLogin.php" method="POST">
    <input type="text" placeholder="Username" name="username"><br>
    <input type="password" placeholder="Password" name="password"><br>
    <input type="submit" name="submit" value="Logga in"><br>
</form>