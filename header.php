<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <title>Document</title> -->
    <?php
    if(empty($title)){
        echo "Min sida!";
    }else 
        echo $title;
    ?>

    <link rel="stylesheet" href="./public/dist/main.css">
    <script src="main.js" defer></script>
</head>
<body>
    <h1>Välkommen till min PHP sida!</h1>
    <ul>
        <li><a href="index.php">Start</a></li>
        <li><a href="about.php">Om oss</a></li>
    </ul>
<hr>