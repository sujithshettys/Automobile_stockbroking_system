<?php
session_start();
if(!isset($_SESSION['pass']))
{
    
 header("location:user.php");  
}
include 'app/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="./assets/gallery.css" />
    <title>gallery</title>
    <style>
    <?php include 'assets/gallery.css'?>
    </style>
  </head> 
  <body>
    <div class="header">
      <h1>car gallery</h1>
      <a href="logout.php">logout</a>
    </div>
    <div class="container">
    <div class="img">
      <img src="./assets/images/4.jpeg" alt="" />
    </div>
    <div class="img">
      <img src="./assets/images/5.jpeg" alt="" />
    </div>
    <div class="img">
      <img src="./assets/images/6.jpeg" alt="" />
    </div>
    <div class="img">
      <img src="./assets/images/7.jpg" alt="" />
    </div>
    <div class="img">
      <img src="./assets/images/8.jpg" alt="" />
    </div>
    <div class="img">
      <img src="./assets/images/9.jpg" alt="" />
    </div>
    </div>
  </body>
</html>
