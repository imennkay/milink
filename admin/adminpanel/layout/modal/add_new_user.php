<?php
      $current_date = date('d/m/Y');
      if (isset($_POST['save_user']))
      {
        $add_username=$_POST['username'];
        $add_email=$_POST['email'];
        $add_password1=$_POST['password'];
        $add_password=md5($add_password1);

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
         move_uploaded_file($add_user_image_temp,"../../images/$add_user_image");


        

        $sql_add_user = "INSERT INTO users(username,email,password,image) VALUES('$add_username', '$add_email', '$add_password', '$add_user_image')";
        $result_sql_add_user= mysqli_query($dbh, $sql_add_user);
        if (!$result_sql_add_user)
                {
                  die("Error description:" . mysqli_error());
                }
                else
                {
                  echo "Data added successfully";
                  header("Location: users_admin.php");
                }
      }
     ?>
      <!--
        <div class="modal fade" id="InsertCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      --> 
        <div class="modal fade" id="InsertUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header modal-header-add">
                <h4 class="modal-title" id="exampleModalLongTitle" align="center"><i class="fa fa-user"></i> Add new admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
 
               
                <div class="form-group col-md-4">
                  <label for="cat_title" class="col-form-label"> Username:</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username Here" required="">
                </div>
                <div class="form-group col-md-4">
                  <label for="cat_title" class="col-form-label"> Email:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Here" data-error="that email address is invalid" required="">
                </div>
                <div class="form-group col-md-4">
                  <label for="password" class="col-form-label"> Password:</label>
                  <input type="password" data-minlength="6" class="form-control" name="password" id="password" placeholder="Enter Password Here" required="">
                </div>
                <div class="form-group col-md-4">
                  <label for="password_reapet" class="col-form-label"> Confirm Password:</label>
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
                </div>
                <div class="form-group col-md-4">
                      <label for="user_imagel" class="col-form-label">Image:</label>
                      <input type="file" name="user_image" id="user_image">
                </div>
                
              </div>
              <br>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="save_user"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
