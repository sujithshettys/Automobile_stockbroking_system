<?php
session_start();
if(!isset($_SESSION['name']) && !isset($_SESSION['password']))
{
    
 header("location:adminlogin.php");  
}
include 'app/connect.php';
if(isset($_POST['submit'])){

	$CARID = $_POST['CARID'];
	$USERID = $_POST['USERID'];

	$check = "SELECT * FROM confirm WHERE CARID = ?";
	$stmt = $conn->prepare($check);
	$stmt->bind_param("s",$CARID);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->num_rows()>0){
		?>
		<script> alert("Car Already Confirmed!");</script>
	<?php
	}else{
		//template for the sql query
		$sql = "INSERT INTO confirm(CARID,USERID) VALUES(?,?)";
	
	//preparing the statement
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss",$CARID,$USERID);
		$result = $stmt->execute();
	
			if($result){ ?>
				<h4>CONGRATULATIONS</h4>
				<?php
			}
		}
	}
 

?>
    
<!DOCTYPE html>
<html>
<head>
<title></title>
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
<form method="post" action="confirm.php" >
</head>
<body>
<div id="main">
<nav> 
<ul>
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
</div>
<fieldset>
<legend id="reg" >Confirm</legend>
<label id="a" for="CARID">CAR ID</label><br>
<input type="text" name="CARID" placeholder="Enter your carid" required autocomplete="off">
<br> 
<label id="b" for="USERID">USERID</label><br>
<input type="text" name="USERID"  placeholder="Enter your userid" required autocomplete="off">
<br> 
<button type="submit" name="submit"><b>Submit</b></button>
</fieldset>
</form>
</body>
</html>




 