 <?php 
 if (isset($_SESSION['type']))
 {
   # code...

   $success_login_id = $_SESSION['id'];
   $success_login_username_admin = $_SESSION['username'];
   $success_login_email_admin = $_SESSION['email'];
   $success_login_type_password_admin = $_SESSION['password'];
   $success_login_image_admin = $_SESSION['image'];
   $success_login_type_admin = $_SESSION['type'];
   }
   ?>
<head>

 <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">

 
  <title>Milink - Blog</title>

</head>