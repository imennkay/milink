<div class="uploadImageform">
  <div class="center">
   <?php
         if(isset($_GET['err']) && $_GET['err']==true){
            echo "<p class='error'>Wrong!". $_GET['message']."</p><br>";
         }
         if(isset($_GET['status']) && $_GET['status']=="success"){
          echo "<p>". $_GET['message']."</p><br>";
          echo "<a href='index.php?page=post'>Continue>></a>";
       }else{
            
            echo "<form action=\"views/uploadImage.php\" method=\"POST\" enctype=\"multipart/form-data\">";
            echo "<div class=\"custom-file mb-3\">";
            echo "<input type=\"file\" class=\"custom-file-input\" name=\"fileToUpload\" id=\"fileToUpload\" >";
            echo "<label class=\"custom-file-label\" for=\"customFile\">Choose image</label>";
            echo "</div>";
            echo "<input type=\"submit\" value=\"Upload Image\" name=\"submit\"><br/>";
            echo "</form>";
       }
   ?>
   
  </div>
  
</div>


