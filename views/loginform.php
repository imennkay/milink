<div class="loginform">
  <div class="center">
   <?php
         if(isset($_GET['err']) && $_GET['err']==true){
            echo "<p class='error'>Wrong!  ". $_GET['message']."</p>";
         }
         $userName=(isset($_GET['username']) ? $_GET['username']: "");
   ?>
   <div class="login-icon"><i class="fas fa-user"></i></div>
   <?php
         // if user is reading post and login in, then go to post page.
         if(isset($_GET['postId'])){
            echo "<form action=\"views/login.php?postId=".$_GET['postId']."\" method=\"post\">";
         }else echo "<form action=\"views/login.php\" method=\"post\">";
   ?>
    
    <input type="text" name="username" placeholder="Username" value="<?php echo $userName; ?>"><br />
    <input type="password" name="password" placeholder="Password" ><br />
    <input type="submit" value="Login" name="submit"><br/>
    </form>
    <button class="signup-btn"><a href="index.php?page=signup">Sign up</a></button>
  </div>
  
</div>