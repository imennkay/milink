<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
<div class="center">

      <?php
         if(isset($_GET['err']) && $_GET['err']==true){
            echo "Wrong!". $_GET['message']."<br>";
         }
       ?>
    <p>Login</p>
    <form action="views/login.php" method="post">
    
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password" >
    <input type="submit" value="Submit" name="submit">

    </form>

    </div>

    </body>
</html>