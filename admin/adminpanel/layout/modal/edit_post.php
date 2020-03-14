<?php

      if (isset($_POST['edit_post']))
      {
        $edit_post_id=$_POST['id_edit'];
        $edit_post_title=$_POST['title_edit'];
        $edit_update_date=$_POST['update_date'];
        $edit_post_text=$_POST['description_edit'];
        $edit_post_title = mysqli_real_escape_string($dbh,$edit_post_title);
        $new_post_image = $_FILES["new_post_image"]["name"];
        $new_post_image_temp = $_FILES["new_post_image"]["tmp_name"];
        move_uploaded_file($new_post_image_temp,"../../images/$new_post_image");
        if (empty($new_post_image))
        {
         $new_post_image=$_POST['post_image_edit1'];
        }

        $edit_post_text=$_POST['description_edit'];
        $edit_post_updated_date=date("Y-m-d H:i:sa");


        $sql_edit_post = "UPDATE posts SET title='$edit_post_title', description='$edit_post_text', image='$new_post_image', updated_date='$edit_post_updated_date' WHERE id={$edit_post_id}";
        $result_sql_edit_post= mysqli_query($dbh, $sql_edit_post);
        if (!$result_sql_edit_post)
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

        <div class="modal fade bd-example-modal-lg" id="EditPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header modal-header-warning">
                <h4 class="modal-title" id="exampleModalLongTitle" align="center"><i class="fa fa-pencil-square-o"></i> Edit post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="demo" onmouseover="mouseOver(this)">
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group">
                  <input type="hidden" class="form-control" id="id_edit" name="id_edit">
                </div>
                <div class="form-group">
                  <label for="title_edit" class="col-form-label">Title:</label>
                  <input type="text" class="form-control" id="title_edit" name="title_edit" placeholder="Enter Title Here">
                </div>
               <br>
                  <div class="form-group" id="foo">
                    <input type="hidden" name="post_image_edit1" id="post_image_edit1">
                    
 <script>
function mouseOver() {
   var image = document.getElementById('image');
   var slikazaprikaz = document.getElementById("post_image_edit1").value; 
   var putanja = '../../images/';
   image.setAttribute('src', putanja + slikazaprikaz);
   
}

</script>
    
                     <img  class="zoom" src="" id="image" name="image" width="50">
                     
                    <br><br>
                      <input type="file" name="new_post_image" id="new_post_image">

                  </div>
                  <div class="form-group shadow-textarea">
                    <label for="post_text_edit" class="col-form-label">Text:</label>
                    <textarea name="description_edit" id="post_text_edit" placeholder="Enter Post Text Here"></textarea>
                  </div>
                    <script>
                       CKEDITOR.replace('post_text_edit');
                    </script>
                 
                </div>
                
              </div>
              <br><br><br>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="edit_post"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>