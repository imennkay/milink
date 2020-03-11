<?php include "db_connection.php" ?>
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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <?php 
                $counter_posts= 0;
                $sql_select_posts = "SELECT * FROM posts ORDER BY id desc";
                $result_sql_select_posts = mysqli_query($dbh, $sql_select_posts);
                while ($rowposts = mysqli_fetch_assoc($result_sql_select_posts))
                {
                  $counter_posts++;
                }
             ?>
            <div class="inner">
              <h3><?php echo $counter_posts; ?></h3>

              <p>Posts</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="post_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <?php 
                $sql_select_users_all = "SELECT * FROM users ORDER BY id desc";
                $result_sql_select_users_all = mysqli_query($dbh, $sql_select_users_all);
                $count_all_users= 0;
                while ($rowusers_all = mysqli_fetch_assoc($result_sql_select_users_all))
                {
                  $count_all_users++;
                }
             ?>
            <div class="inner">
              <h3><?php echo $count_all_users; ?></h3>

              <p>Users / Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="users_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <?php 
                $sql_select_comment_all= "SELECT * FROM comment ORDER BY id asc";
                $result_sql_select_comment_all = mysqli_query($dbh, $sql_select_comment_all);
                $count_all_comments=0;
                while ($rowcomment = mysqli_fetch_assoc($result_sql_select_comment_all))
                {
                  $count_all_comments++;
                }
             ?>
            <div class="inner">
              <h3><?php echo $count_all_comments ?></h3>

              <p>Comments</p>
            </div>
            <div class="icon">
              <i class="fa fa-comments"></i>
            </div>
            <a href="comment_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- Modal add new post -->
    <?php include "layout/modal/add_new_post.php"; ?>
     <!-- // Modal add new Post -->
  <!-- /.content-wrapper -->
  <?php include "layout/footer.php"; ?>

<!-- ./wrapper -->

<?php include "layout/scripts.php"; ?>
</body>
</html>
