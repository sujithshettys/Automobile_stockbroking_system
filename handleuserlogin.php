<?php
include 'app/connect.php';
session_start();
if(isset($_POST['submit']))
{
 $EMAIL = $_POST['EMAIL'];
 $PASSWORD = $_POST['PASSWORD'];
 
 $sql = "SELECT EMAIL,PASSWORD FROM users WHERE EMAIL = ?";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("s",$EMAIL);
 $stmt->execute();
 $stmt->bind_result($db_email,$db_pass);

 if($stmt->fetch())
 {
//  $_SESSION['Name'] = $db_name;
 
 if($EMAIL == $db_email && $PASSWORD == $db_pass)
 {
 echo "Login successful";
 $_SESSION['pass'] = $db_pass;
 
 header("location:userafterlogin.php");
 }else
 {
	 echo "login unsuccess";
 }
}
}
 ?>