<?php
session_start();
if(!isset($_SESSION['pass']))
{
    
 header("location:user.php");  
}
include 'app/connect.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Userafterlogin</title>
    
    <!-- <link rel="stylesheet" href="assets/userafterlogin.css" /> -->
    <style>
     body {
  background-image: url("1.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}
    <?php include 'assets/userafterlogin.css'?>
    </style>
  </head>
  <body>
    <div class="header">
      <h1>car details</h1>
      <a href="gallery.php" id="gallery">gallery</a>
      <a href="buy.php">BUY</a>
      <a href="carconfirmed.php">Car sold</a>
      <a href="logout.php">logout</a>
    </div>
    <table>
      <tr>
        <th>CARID</th>
        <th>CARNAME</th>
        <th>CARMODEL</th>
        <th>OWNERNAME</th>
        <th>EMAIL</th>
        <th>PRICE</th>
      </tr>
      <?php 
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT CARID, CARNAME,CARMODEL,OWNERNAME,EMAIL,PRICE FROM cardetails";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          
            ?>
           
      <?php
      while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row['CARID']."</td>
        <td>".$row['CARNAME']."</td>
        <td>".$row['CARMODEL']."</td>
        <td>".$row['OWNERNAME']."</td>
        <td>".$row['EMAIL']."</td>
        <td>".$row['PRICE']."</td>
        </tr>";
      }
      ?>
    
            <?php
          
        } else {
          echo "0 results";
        }
        $conn->close();
      
      
      ?>
      </table>
    </div>
  </body>
</html>