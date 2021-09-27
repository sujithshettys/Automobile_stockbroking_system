<?php
session_start();
include 'app/connect.php';
if(!isset($_SESSION['name']) && !isset($_SESSION['password']))
{
    
 header("location:adminlogin.php");  
}
if(isset($_POST['submit'])){

	$CARID = $_POST['CARID'];
	$sql = " DELETE FROM `cardetails` WHERE CARID=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$CARID);
	$result=$stmt->execute();
	 	 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="assets/delete.css">
	 <style>
         body
{
 background-image: url("1.jpg");
 background-repeat: no-repeat;
 background-size:cover;
}
     </style>    
</head>
<body>
<div id="main">
<nav> 
<ul>
<!-- <li><a href="homepage.php">HOME</a></li> -->
<li><a href="adminlogin.php">LOGOUT</a></li>
</ul>
</nav>
</div>

<form method="post" action="delete.php">
	<fieldset>
	<label for="CARID"> DELETE </label> 
	<input type="text" name="CARID" placeholder="Enter car id" required >

	<button type="submit" name="submit">SUBMIT</button>
	</fieldset>
</form>
</body>
</html>