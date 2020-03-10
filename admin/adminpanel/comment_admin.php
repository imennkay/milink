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
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
           <?php 
             if (isset($_POST['selectOneCheckBoxArray']))
             {
                 //header("Location: index.php");
               foreach ($_POST['selectOneCheckBoxArray'] as $checked_Box_Comment_Id)
               {
                $group_options = $_POST['group_options'];
                switch ($group_options) {
                  case '1':
                    $sql_group_publish = "UPDATE comment SET comm_status= '{$group_options}' WHERE id={$checked_Box_Comment_Id}";
                     $result_sql_group_publish= mysqli_query($dbh, $sql_group_publish);
                    break;
                  case '0':
                    $sql_group_unpublish = "UPDATE comment SET comm_status= '{$group_options}' WHERE id={$checked_Box_Comment_Id}";
                     $result_sql_group_unpublish= mysqli_query($dbh, $sql_group_unpublish);
                    break;
                  case 'delete':
                  $sql_group_delete = "DELETE FROM comment WHERE id ={$checked_Box_Comment_Id}";
                  $result_sql_group_delete = mysqli_query($dbh, $sql_group_delete);
                  header("Location: comment_admin.php");
                    # code...
                    break;
                  
                  default:
                    # code...
                    break;
                }
               }
               header("Location: comment_admin.php");
             }

              ?>

          

               
               
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
              <th style="text-align: center;">Comments</th>
              <th style="text-align: center;">Edit/Delete</th>
            </tr>
            <?php 
                $sql_select_comment = "SELECT * FROM comment ORDER BY id desc";
                $result_sql_select_comment = mysqli_query($dbh, $sql_select_comment);
                while ($rowcomment = mysqli_fetch_assoc($result_sql_select_comment))
                {
                  $view_comm_id = $rowcomment['id'];
                  $view_comm_text = $rowcomment['content'];
                  $view_comm_date = $rowcomment['created_date'];
             ?>
             <tbody id="myTable">
            <tr class="success">
              <td style="text-align: center;">
              </td>
             
              <td style="text-align: center;">
                <?php
                   echo $view_comm_text
                 ?>
                 
              </td>
              
           
              <td style="text-align: center;">


               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteComment" data-comment_id_delete="<?= $view_comm_id ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
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
     
      <?php include "layout/modal/delete_comment.php" ?>
<!-- Modal add new post -->
    <?php include "layout/modal/add_new_post.php"; ?>
     <!-- // Modal add new Post -->
     <!-- Modal EDIT  user -->
    <?php include "layout/modal/edit_user.php" ?>
  </div>
  <!-- /.content-wrapper -->
  <?php include "layout/footer.php"; ?>

<!-- ./wrapper -->
<?php include "layout/scripts.php"; ?>



</body>
</html>
