<?php
include 'app/connect.php';
session_start();
if(!isset($_SESSION['name']) && !isset($_SESSION['password']))
{
    
 header("location:adminlogin.php");  
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
       <link rel="stylesheet" href="assets/userafterlogin.css" type="text/css"> 
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
    <div class="header">
      <h1>Buyers details</h1>
      <a href="confirm.php">Confirm</a>
      <a href="logout.php">logout</a>
    </div>  
        <table  class="content-table">
            <tr>
                <th>USER NAME</th>
                <th>USERID</th>
                <th>CARID</th>
                
            </tr>
            <?php
               $sql ="SELECT users.NAME, buyers.USERID,buyers.CARID FROM users,cardetails,buyers
                    WHERE users.USERID= buyers.USERID AND cardetails.CARID=buyers.CARID";
               $stmt = $conn->prepare($sql);
               $stmt->execute();
               $result = $stmt->get_result();
               while($row = $result->fetch_assoc())
               {
                   ?>
                   <tr class="active-row">
                       <td> <?php echo $row['NAME']; ?> </td>
                       <td> <?php echo $row['USERID']; ?> </td>
                       <td> <?php echo $row['CARID']; ?> </td>
                    </tr>  
                    <?php 
               }
            ?>
        </table>

    </body>
</html>    