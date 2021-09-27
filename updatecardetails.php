<?php
include 'app/connect.php';
session_start();
if(!isset($_SESSION['name']) && !isset($_SESSION['password']))
{
    
 header("location:adminlogin.php");  
}
if(isset($_POST['submit']))
{
 $CARID = $_POST['CARID'];
 $CARNAME = $_POST['CARNAME'];
 $CARMODEL = $_POST['CARMODEL'];
 $OWNERNAME = $_POST['OWNERNAME'];
 $EMAIL = $_POST['EMAIL'];
 $PRICE = $_POST['PRICE'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO cardetails  (`CARID`, `CARNAME`, `CARMODEL`, `OWNERNAME`, `EMAIL`, `PRICE`)
  VALUES ('$CARID','$CARNAME','$CARMODEL','$OWNERNAME','$EMAIL','$PRICE')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
}
 ?>
<!DOCTYPE html>
<html>
<head>
<title>update car details</title>
<!-- <link rel="stylesheet" href="assets/adminlogin.css"> -->
 
<style>
body
{
 background-image: url("1.jpg");
 background-repeat: no-repeat;
 background-size:cover;
}
 <?php include 'assets/updatecardetails.css'?>
</style>
<form method="post" action="updatecardetails.php" >
</head>
<body>
<div id="main">
<nav> 
<ul>
<li><a href="logout.php">logout</a></li>
</ul>
</nav>
</div>
<fieldset>
<legend id="reg" >Admin</legend>
<label id="a" for="CARID">CARID</label><br>
<input type="text" name="CARID"  placeholder="Enter car ID" required autocomplete="off">
<br> 
<label id="b" for="CARNAME">CARNAME</label><br>
<input type="text" name="CARNAME"  placeholder="Enter car name" required autocomplete="off">
<br> 
<label id="c" for="CARMODEL">CARMODEL</label><br>
<input type="text" name="CARMODEL"  placeholder="Enter car model" required autocomplete="off" >
<br> 
<label id="d" for="OWNERNAME">OWNERNAME</label><br>
<input type="text" name="OWNERNAME" maxlength="50" placeholder="Enter owner name" required autocomplete="off" >
<br> 
<label id="e" for="EMAIL">EMAIL</label><br>
<input type="email" name="EMAIL"  placeholder="Enter Email-id" required autocomplete="off">
<br> 
<label id="f" for="PRICE">PRICE</label><br>
<input type="number" name="PRICE" maxlength="10" placeholder="Enter car price" required autocomplete="off">
<br> 
<button type="submit" name="submit"><b>Submit</b></button>
</fieldset>
</form>
</body>
</html>