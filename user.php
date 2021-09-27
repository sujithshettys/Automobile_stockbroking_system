<?php
include 'app/connect.php';
session_start();
if(isset($_POST['submit']))
{

 $USERID=$_POST['USERID'];
 $NAME = $_POST['NAME'];
 $EMAIL = $_POST['EMAIL'];
 $PASSWORD=$_POST['PASSWORD'];
 $PHONE=$_POST['PHONE'];

 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

 $sql = "INSERT INTO `users`(`USERID`, `NAME`, `EMAIL`, `PASSWORD`, `PHONE`) 
 VALUES ('$USERID','$NAME','$EMAIL','$PASSWORD','$PHONE')";
 
 if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
  $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User</title>
    <style>
        body
        {
         background-image: url("1.jpg");
         background-repeat: no-repeat;
         background-size:cover;
        }
        </style>
    <link rel="stylesheet" href="assets/user.css">
    
</head>
<body>
    <div class="full-page">
        <div class="navbar">
            <nav>
                <ul id='MenuItems'>
                    <li><a href="homepage.php">HOME</a></li>
                </ul>
            </nav>
        </div>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                    <button type='button'onclick='register()'class='toggle-btn'>Register</button>
                </div>
                <form id='login' method="post" class='input-group-login' action="handleuserlogin.php">
                    <input type='email'class='input-field'placeholder='Email Id' name='EMAIL' required >
		    <input type='password'class='input-field'placeholder='Enter Password' name='PASSWORD'required>
		    <input type='checkbox'class='check-box'><span>Remember Password</span>
		    <button type='submit'class='submit-btn' name="submit">Log in</button>
		 </form>
		 <form id='register' method="post" class='input-group-register' action="user.php">
             <input type='text'class='input-field'placeholder='User Id'name='USERID' required>
		     <input type='text'class='input-field'placeholder='Name'name='NAME' required>
		     <input type='email'class='input-field'placeholder='Emial 'name='EMAIL' required>
		     <input type='password'class='input-field'placeholder='Password' name='PASSWORD'required>
		     <input type='number'class='input-field'placeholder='Enter Phone number' name='PHONE' required>
		     <input type='checkbox'class='check-box'><span>I agree to the terms and conditions</span>
            <button type='submit'class='submit-btn' name="submit">Register</button>
	         </form>
            </div>
        </div>
    </div>
    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>