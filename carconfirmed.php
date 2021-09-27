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
      <h1>Confiremed details</h1>
      <a href="logout.php">logout</a>
    </div>  
        <table  class="content-table">
            <tr>
                <th>USER NAME</th>
                <th>USERID</th>
                <th>CARID</th>
                <th>PRICE</th>
                
            </tr>
            <?php
               $sql ="SELECT users.NAME, confirm.USERID,confirm.CARID,cardetails.PRICE FROM users,cardetails,confirm
                    WHERE users.USERID= confirm.USERID AND cardetails.CARID=confirm.CARID";
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
                       <td> <?php echo $row['PRICE']; ?> </td>
                    </tr>  
                    <?php 
               }
            ?>
        </table>

    </body>
</html>    


 