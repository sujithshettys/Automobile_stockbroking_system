<?php
include 'app/connect.php';
if(isset($_POST['submit']))
{
 $ADMINID = $_POST['AdminID'];
 $Name = $_POST['Name'];
 $Password = $_POST['Password'];
 $sql = "SELECT id,name,password FROM admin WHERE id = ?";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("s",$ADMINID);
 $stmt->execute();
 $stmt->bind_result($db_aid,$db_name,$db_pass);

 if($stmt->fetch())
 {
 $_SESSION['Name'] = $db_name;
 
 if($ADMINID == $db_aid && $Password == $db_pass)
 {
 echo "Login successful";
 session_start();
 $_SESSION['name'] = $db_name;
 $_SESSION['password'] = $db_pass;
 
 header("location:adminafterlogin.php");
 }else
 {
	 echo "login unsuccess";
 }
}
}
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Adminlogin</title>
<!-- <link rel="stylesheet" href="assets/adminlogin.css"> -->
 
<style>
body
{
 background-image: url("1.jpg");
 background-repeat: no-repeat;
 background-size:cover;
}
 <?php include 'assets/adminlogin.css'?>
</style>
<form method="post" action="adminlogin.php" >
</head>
<body>
<div id="main">
<nav> 
<ul>
<li><a href="homepage.php">HOME</a></li>
</ul>
</nav>
</div>
<fieldset>
<legend id="reg" >Admin</legend>
<label id="a" for="AdminID">ADMIN ID</label><br>
<input type="text" name="AdminID" " placeholder="Enter your ID" required autocomplete="off">
<br> 
<label id="b" for="Name">NAME</label><br>
<input type="text" name="Name"  placeholder="Enter your Name" required autocomplete="off">
<br> 
<label id="c" for="Password">PASSWORD</label><br>
<input type="password" name="Password" maxlength="20" placeholder="Enter your Password" required autocomplete="off" >
<br> 
<button type="submit" name="submit"><b>Submit</b></button>
</fieldset>
</form>
</body>
</html>