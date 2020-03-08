<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?php
          if(empty($title)){
            echo "Milink";
          }else echo $title;
      ?>
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
    <script src="app.js" defer></script>
</head>
<body>
    <nav>
        <div class="hamburger">
            <i class="fa fa-bars"></i>
        </div>
        <ul class="nav-links">
           <li><a href="index.php">Home</a></li>
           <li><a href="index.php?page=post">Post</a></li>
           <li><a href="index.php?page=about">About</a></li>
           <?php
               if(!isset($_SESSION['user__name'])){
                echo "<li><a href=\"index.php?page=login\">Login/Sign up</a></li>";
               }
           ?>
       </ul>
       <div>
          <?php
               if(isset($_SESSION['user__name'])){
                $userId=$_SESSION['user__id'];
                $sql="select image from users where id=:userId";
                $stmt=$dbh->prepare($sql);
                $stmt->bindParam(':userId', $userId);
                $stmt->execute();
                $data=$stmt->fetch(PDO::FETCH_ASSOC);
                echo "<div class=\"popup\" onclick=\"showPopup()\">";
                echo "<img class=\"user-image\" src=\"images/".$data['image']."\" alt=\"user image\"> Hi ".$_SESSION['user__name']."!";
                echo "<div class=\"popuptext\" id=\"myPopup\">";
                echo "<a href=\"views/logout.php\">Log out</a>";
                echo "<a href=\"index.php?page=changePassword\">Change password</a>";
                echo "<a href=\"index.php?page=uploadImage\">Change user image</a>";
                echo "</div>";
                echo "</div>";
                }
          ?>
       </div>
       <script>
       // When the user clicks on username, open the popup
        function showPopup() {
           var popup = document.getElementById("myPopup");
           popup.classList.toggle("show");
        }
       </script>
    </nav>