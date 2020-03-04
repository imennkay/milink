   <div class="signup-form">
       <div class="center">
       <?php
         if(isset($_GET['err']) && $_GET['err']=true){
            echo "<p class=\"error\">Wrong!". $_GET['message']."<p>";
         }
         $userName=(isset($_GET['username']) ? $_GET['username']: "");
         $Email=(isset($_GET['email']) ? $_GET['email']: "");

       ?>
           <div class="login-icon"><i class="fas fa-user"></i></div>
           <form action="views/signup.php" method="POST">
              <input type="text" name="username" placeholder="Username" value="<?php echo $userName; ?>"><br>
              <input type="email" name="email" placeholder="Email" value="<?php echo $Email; ?>"><br>
              <input type="password" name="password" placeholder="Password"><br>
              <input type="password" name="password_confirm" placeholder="Confirm password"><br>
              <input type="submit" value="Signup" name="submit"><br>
           </form>
        </div>
   </div>
   