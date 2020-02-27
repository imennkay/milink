<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?php
          if(empty($title)){
            echo "Post";
          }else echo $title;
      ?>
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
       <ul class="nav-links">
           <li><a href="index.php">Home</a></li>
           <li><a href="index.php?page=post">Post</a></li>
           <li><a href="index.php?page=about">About</a></li>
           <?php
               if(isset($_SESSION['user__name'])){
                   echo "<li><a href=\"index.php?page=logout\">Log out</a></li>";
               }else{
                echo "<li><a href=\"index.php?page=login\">Login</a></li>";
                echo "<li><a href=\"index.php?page=signup\">Sign up</a></li>";
               }
           ?>
       </ul>
    </nav>