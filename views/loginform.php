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
    <?php
         // if user is reading post and login in, then go to post page.
         if(isset($_GET['postId'])){
            echo "<form action=\"views/login.php?postId=".$_GET['postId']."\" method=\"post\">";
         }else echo "<form action=\"views/login.php\" method=\"post\">";
       ?>
    
    <input type="text" name="username" placeholder="Username"><br />
    <input type="password" name="password" placeholder="Password" ><br />
    <input type="submit" value="Login" name="submit"><br />

    </form>

    </div>

    </body>
</html>