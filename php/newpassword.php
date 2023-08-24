<?php
session_start();
include 'php/_dbconnect.php';
  if(isset($_POST['password']))
  {
        $username=$_SESSION['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        if($password==$cpassword)
        {
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $sql="UPDATE `user_data` SET `password` = '$hash' WHERE `user_name` = '$username'";
          $result = mysqli_query($conn, $sql);
          header("location:php/login.php");

        }
        else{
          echo"
	<script>
    alert('passwords dont match!!');
    
    </script>
    ";
        }
  }
  

?>



<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="logo" src="img/logo.jpeg">
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/verify.png">
		</div>
		<div class="login-content">
			<form action="php/newpassword.php" method="post" >
				<h2 class="title">Reset Password</h2>
    <div class="input-div pass">
     <div class="i"> 
       <i class="fas fa-lock"></i>
     </div>
     <div class="div">
       <h5>Password</h5>
       <input type="password" class="input" name="password">
     </div>
  </div>
  <div class="input-div pass">
     <div class="i"> 
       <i class="fas fa-lock"></i>
     </div>
     <div class="div">
       <h5>Confirm Password</h5>
       <input type="password" class="input" name="cpassword" >
     </div>
  </div>

     <input type="submit" class="btn" value="Set New Password">
   </form>
  </div>
 </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>