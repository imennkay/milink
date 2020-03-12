<?php
      $current_date = date('d/m/Y');
      if (isset($_POST['save_post']))
      {
        $add_post_title=$_POST['title'];
        $add_post_category=$_POST['category'];
        $add_post_title = mysqli_real_escape_string($dbh,$add_post_title);
        $add_post_autor=$_POST['userid'];
        $add_post_image=$_POST['post_image'];
        $image_extension = pathinfo($_FILES["post_image"]["name"], PATHINFO_EXTENSION);
        if ($image_extension=='jpg' || $image_extension=='jpeg' || $image_extension=='png' || $image_extension=='gif') 
        {
          $add_post_image = $_FILES["post_image"]["name"];
          $add_post_image_temp = $_FILES["post_image"]["tmp_name"];
        }
        
        if (empty($add_post_image))
        {
         $add_post_image="nophoto-default.jpg";
        }
         move_uploaded_file($add_post_image_temp,"../../images/$add_post_image");

        $add_post_text=$_POST['description_edit'];
        

        $sql_add_post = "INSERT INTO posts(title,description,image,category,userid) VALUES('$add_post_title', '$add_post_text', '$add_post_image', '$add_post_category', $add_post_autor)";
        $result_sql_add_post= mysqli_query($dbh, $sql_add_post);
        if (!$sql_add_post)
                {
                  die("Error description:" . mysqli_error());
                }
                else
                {
                  echo "Data added successfully";
                  header("Location: post_admin.php");
                }
      }
     ?>
     
        <div class="modal fade bd-example-modal-lg" id="InsertPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header modal-header-add">
                <h4 class="modal-title" id="exampleModalLongTitle" align="center"><i class="fa fa-file"></i> Add new post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="title" class="col-form-label">Title:</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title Here" required="">
                </div>
                <script>

}
</script>
<div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="title" class="col-form-label">Category:</label>
                  <input type="text" class="form-control" id="title" name="category" placeholder="Enter Category Here" required="">
                </div>
                    <div class="col-sm-4">
                      <label for="userid" class="col-form-label">Author:</label>
                      <p><b><?php echo $success_login_username_admin; ?></b>  &nbsp;<img src="../../images/<?php echo $success_login_image_admin; ?>" class="zoom3" alt="User Image" width="50"></p>
                      <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $success_login_id; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="post_image" class="col-form-label">Image:</label>
                      <input type="file" name="post_image" id="post_image" accept="image/*">
                  </div>
                  <div class="form-group shadow-textarea">
                    <label for="description_edit" class="col-form-label">Text:</label>
                    <textarea name="description_edit" id="description_edit" placeholder="Enter Post Text Here" required></textarea>
                  </div>
                    <script>
                       CKEDITOR.replace('description_edit');
                    </script>
                 
                </div>
                
              </div>
              <br><br><br>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="save_post"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>