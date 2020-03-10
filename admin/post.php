<?php 
ob_start();
  include "adminpanel/db_connection.php";
?>

     
<!DOCTYPE html>
<html lang="en">

<?php include "layout/head.php"; ?>

<body>

  <!-- Navigation -->

  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <?php 
      if (isset($_GET['postid'])) 
      {
        $selected_post_page= $_GET['postid'];

                $sql_select_post_page = "SELECT * FROM posts WHERE id={$selected_post_page}";
                $result_sql_select_post_page = mysqli_query($dbh, $sql_select_post_page);
                while ($rowpostpage = mysqli_fetch_assoc($result_sql_select_post_page))
                {
                  $view_post_id = $rowpost['id'];
                  $view_post_title = $rowpost['title'];
                  $view_post_text = $rowpost['description'];
                  $view_post_image = $rowpost['image'];
                  $view_post_category = $rowpost['category'];
                  $view_post_status = $rowpost['post_status'];
                  $view_post_date = $rowpost['created_date'];
                  $view_post_userid = $rowpost['userid'];
                }
      }
      else
      {
        header("Location: index.php");
      }


       ?>
      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $view_post_title ?></h1>
        <div id="p11"></div>
        <!-- Author -->
        <?php 
                $sql_select_users = "SELECT * FROM users WHERE id={$view_post_autor}";
                $result_sql_select_users_article = mysqli_query($dbh, $sql_select_users_article);
                while ($rowusers = mysqli_fetch_assoc($result_sql_select_users_article))
                {
                  $view_users_id = $rowusers['id'];
                  $view_users_username = $rowusers['username'];
                  $view_users_image = $rowusers['image'];
                } 
             ?>
        <p class="lead">
         <img src="../images/<?php echo $view_users_image; ?>" class="zoom3" alt="User Image" width="50" align="left" hspace="5">
            By <a href="#"><?php echo $view_users_username; ?></a> <br>Web developer <a href="#">Milink</a>
          
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on <?php echo $view_post_date; ?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="/images/<?php  echo $view_post_image; ?>" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $view_post_text; ?></p>
        <hr>

        <!-- Comments Form -->
        <?php include "layout/comment_form.php" ?>

        <!-- Single Comment -->
        <?php include "layout/comments.php" ?>

        

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include "layout/sidebar.php"; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include "layout/footer.php"; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
