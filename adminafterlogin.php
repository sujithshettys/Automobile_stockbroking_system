<?php
session_start();
if(!isset($_SESSION['name']) && !isset($_SESSION['password']))
{
    
 header("location:adminlogin.php");  
}
?>
<!DOCTYPE html>
<html>
<head>
<title>adminafterlogin</title>
<style>
body
{
 background-image: url("1.jpg");
 background-repeat: no-repeat;
 background-size:cover;
}
<?php include 'assets/adminafterlogin.css'?>
</style>
<!-- <link rel="stylesheet" href="assets/adminafterlogin.css"> -->
</head>
<body>
<div id="main">
<nav> 
<ul>
<!-- <li><a href="homepage.php">HOME</a></li> -->
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
</div>
<div id = "boxes"> 
<a class="link" href="userdetails.php">
user details
</a> 
<a class="link" href="buyersdetails.php">
Buyers details
</a> 
<a class="link" href="delete.php">
Delete
</a>
<a class="link" href="updatecardetails.php">
Update Car Details
</a>
</div>
</body>
</html>