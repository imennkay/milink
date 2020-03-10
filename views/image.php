
<?php
      if (isset($_POST['upload']))
      {
        $userImage=$_POST['user_image'];

        $image_extension = pathinfo($_FILES["user_image"]["name"], PATHINFO_EXTENSION);
        if ($image_extension=='jpg' || $image_extension=='jpeg' || $image_extension=='png' || $image_extension=='gif') 
        {
          $add_user_image = $_FILES["user_image"]["name"];
          $add_user_image_temp = $_FILES["user_image"]["tmp_name"];
        }
        
        if (empty($add_user_image))
        {
         $add_user_image="nophoto-default.jpg";
        }
         move_uploaded_file($add_user_image_temp,"images/$add_user_image");

        $sql_user_image = "INSERT INTO users(image) VALUES('$add_user_image')";
        $result_sql_user_image= mysqli_query($dbh, $sql_user_image);
        if (!$result_sql_user_image)
                {
                  die("Error description:" . mysqli_error());
                }
                else
                {
                  echo "image added successfully";
                  header("Location: index.php");
                }
      }
     ?>



<label for="user_imagel" >Image:</label>
<input type="file" name="user_image" id="user_image">
 

 <button type="submit" name="upload"><span  aria-hidden="true"></span>Upload</button>
