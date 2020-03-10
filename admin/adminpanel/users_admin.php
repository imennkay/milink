<?php 
  ob_start();
  include "db_connection.php";
?>
<!DOCTYPE html>
<html>
<?php include "layout/head.php"; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include "layout/header.php"; ?>
  <?php include "layout/leftsidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
          

          
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#InsertUser"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new admin</button>
          <div class="box-tools pull-right">
            
          </div>
        </div>
        <div class="box-body">
          
          <form action="" method="post">
           <table width=100%>
            <tr>
              

               
               
               <th>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script>
                $(document).ready(function(){
                  $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                  });
                });
                </script>
                  <input class="col-xs-4" type="text" placeholder="Search" id="myInput" aria-label="Search">
              </th>
              
             </tr>

           </table>
            <br>
          <table class="table table-hover">
            <tr class="info">
              <th style="text-align: center;">
              </th>
              <th style="text-align: center;">Username</th>
              <th style="text-align: center;">Email</th>
              <th style="text-align: center;">Image</th>
              <th style="text-align: center;">Edit/Delete</th>
            </tr>
            <?php 
                $sql_select_users = "SELECT * FROM users ORDER BY id desc";
                $result_sql_select_users = mysqli_query($dbh, $sql_select_users);
                while ($rowusers = mysqli_fetch_assoc($result_sql_select_users))
                {
                  $view_users_id = $rowusers['id'];
                  $view_users_username = $rowusers['username'];
                  $view_users_email = $rowusers['email'];
                  $view_users_password = $rowusers['password'];
                  $view_users_image = $rowusers['image'];

             ?>
             <tbody id="myTable">
            <tr class="success">
              <td style="text-align: center;">
              </td>
              <td style="text-align: center;"><?php echo $view_users_username ?></td>
              <td style="text-align: center;"><?php echo $view_users_email ?></td>
              <td style="text-align: center;"><img  class="zoom" src="../../images/<?php  echo $view_users_image; ?>" width="50"></td>
             
              
                <td style="text-align: center;">
                <button type="button" name="edit" class="btn btn-warning" data-toggle="modal" data-target="#EditUser" data-user_id_edit="<?= $view_users_id ?>" data-user_name_edit="<?= $view_users_name ?>" data-user_username_edit="<?= $view_users_username ?>" data-user_email_edit="<?= $view_users_email ?>" data-user_image_edit="<?= $view_users_image ?>" data-user_type_edit="<?= $view_users_type ?>" data-user_type_edit1="<?= $view_users_type ?>" data-user_gender_edit="<?= $view_users_gender ?>" data-user_password_edit="<?= $view_users_password ?>" > <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>

               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteUser" data-user_id_delete="<?= $view_users_id ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
              </td>
            </tr>
            <?php
                } 
             ?>
             </tbody>
          </table>
          </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
     <!-- Modal add new category -->
      <?php include "layout/modal/add_new_user.php" ?>
     <!-- // Modal add new category -->
    <!-- Modal Delete Category-->
      <?php include "layout/modal/delete_user.php" ?>
    <!-- // Modal Delete Category-->
    <!-- Modal EDIT  user -->
    <?php include "layout/modal/edit_user.php" ?>
<!-- // Modal EDIT  user -->
<!-- Modal add new post -->
    <?php include "layout/modal/add_new_post.php"; ?>
     <!-- // Modal add new Post -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "layout/footer.php"; ?>

<!-- ./wrapper -->
<?php include "layout/scripts.php"; ?>



</body>
</html>
