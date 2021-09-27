<?php
session_start();
include 'app/connect.php';
if(!isset($_SESSION['name']) && !isset($_SESSION['password']))
{
    
 header("location:adminlogin.php");  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>      
body
{
 background-image: url("1.jpg");
 background-repeat: no-repeat;
 background-size:cover;
}
        <?php include 'assets/userdetails.css'?>
    </style>
    <title>user details</title>
</head>
<body>
    <div class="header">
        <h1>user details</h1>
        <a href="logout.php">logout</a>
      </div>
      <table class="users">
        <tr>
          <th>USERID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>PASSWORD</th>
          <th>PHONE</th>
        </tr>
  	    
        <?php 
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          
          $sql = "SELECT `USERID`, `NAME`, `EMAIL`, `PASSWORD`, `PHONE` FROM `users`";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>
              <td>".$row["USERID"]."</td>
              <td>".$row["NAME"]."</td>
              <td>".$row["EMAIL"]."</td>
              <td>".$row["PASSWORD"]."</td>
              <td>".$row["PHONE"]."</td>
            </tr>";
              //echo "name: " . $row["name"]. " contact: " . $row["contact"]. " email" . $row["email"]." password" . $row["password"]."<br>";
            }
          } else {
            echo "0 results";
          }
          $conn->close();
        
        
        ?>
        </table>
</body>
</html>