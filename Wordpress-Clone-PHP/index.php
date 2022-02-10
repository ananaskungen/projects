<?php 
require_once "./properties/methods.php";
require_once "./properties/connection.php";
require_once "./properties/header.php";
require_once "deletepost.php";
isUserLoggedIn();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css" />
  <title>User Page</title>
</head>
<body>
<h1 class="latest-blogpost">Latest Blogposts</h1>
<div class="container">
  <div class="wrapper">
    <div class="div-blog">

         <?php listAllBlogpost(); ?>  
    

    </div>
  </div>
</div>



</html>