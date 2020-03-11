<div class="changePasswordform">
  <div class="center">
   <?php
         if(isset($_GET['err']) && $_GET['err']==true){
            echo "<p class='error'>Wrong!". $_GET['message']."</p><br>";
         }
         if(isset($_GET['status']) && $_GET['status']=="success"){
          echo "<p>Password has been changed!</p>";
          echo "<a href='index.php?page=post'>Continue>></a>";
       }else{
            echo "<form action=\"views/changePassword.php\" method=\"POST\">";
            echo "<input type=\"password\" name=\"old_password\" placeholder=\"Original Password\" >";
            echo "<input type=\"password\" name=\"new_password\" placeholder=\"New Password\" >";
            echo "<input type=\"password\" name=\"new_password_confirmed\" placeholder=\"Confirm new password\" ><br />";
            echo "<input type=\"submit\" value=\"Change\" name=\"submit\"><br/>";
            echo "</form>";
       }
   ?>
   
  </div>
  
</div>