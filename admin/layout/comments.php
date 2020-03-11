<?php 
if (isset($_GET['postid'])) 
{
	$id_post_for_comment = $_GET['postid'];

    $sql_select_comment_for_post = "SELECT * FROM comment WHERE comm_status= 1 AND postid = $id_post_for_comment";
    $result_sql_select_comment_for_post = mysqli_query($dbh, $sql_select_comment_for_post);
                while ($rowcomment_for_post = mysqli_fetch_assoc($result_sql_select_comment_for_post))
                {
                  $view_comm_id = $rowcomment['id'];
                  $view_comm_postid = $rowcomment['postid'];
                  $view_comm_autor = $rowcomment['userid'];
                  $view_comm_text = $rowcomment['content'];
                  $view_comm_status = $rowcomment['comm_status'];
                  $view_comm_date = $rowcomment['created_date'];
                  
?>


 <?php 
              if (is_numeric($view_comm_autor))
                  {
                    $sql_select_users_for_comm = "SELECT * FROM users WHERE id ={$view_comm_autor}";
                    $result_sql_select_users_for_comm = mysqli_query($dbh, $sql_select_users_for_comm);
                    $counter_comm_user_log = 0;
                    while ($rowusers_for_comm = mysqli_fetch_assoc($result_sql_select_users_for_comm))
                    {
                      $counter_comm_user_log++;
                      $view_users_id_for_comm = $rowusers_for_comm['id'];
                      $view_users_username_for_comm = $rowusers_for_comm['username'];
                      $view_users_email_for_comm = $rowusers_for_comm['email'];
                      $view_users_password_for_comm = $rowusers_for_comm['password'];
                      $view_users_image_for_comm = $rowusers_for_comm['image'];
                      $view_users_type_for_comm = $rowusers_for_comm['type'];
                      
                    
                 

             ?>
<div class="media mb-4">
          <img class="zoom3" src="/images/<?php echo $view_users_image_for_comm; ?>" alt="" width="50">
          <div class="media-body">
           
            <h5 class="mt-0">
            <?php 
            if (!empty($view_users_username_for_comm))
            {
              echo $view_users_username_for_comm; 
            
            
            ?>
              
            </h5>
            <?php
           
              echo $view_comm_text; 
           }
            
            ?>

          </div>
        </div>
<?php 
}
}
else
  {
   
 ?>

<div class="media mb-4">
          <img class="zoom3" src="/images/user.png" alt="" width="50">
          <div class="media-body">
           
            <h5 class="mt-0">
            <?php 
            if (!empty($view_comm_autor))
            {
              echo $view_comm_autor; 
            
            
            ?>
              
            </h5>
            <?php
           
              echo $view_comm_text; 
           }
            
            ?>

          </div>
        </div>










<?php   
 }  
}
}

 ?>