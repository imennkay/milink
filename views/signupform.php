<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
       <div class="center">
       <?php
         if(isset($_GET['err']) && $_GET['err']=true){
            echo "Wrong!". $_GET['message']."<br>";

         } 
      
       ?>
         <p>Sign up</p>
           <form action="views/signup.php" method="POST">
              <input type="text" name="username" placeholder="Username"><span>*</span><br>
              <input type="password" name="password" placeholder="Password"><span>*</span><br>
              <input type="password" name="password_confirm" placeholder="Confirm password"><span>*</span><br>
              <input type="submit" value="Signup" name="submit"><br>
           </form>
        </div>
    </body>
</html>
   