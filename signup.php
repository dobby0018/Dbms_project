<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$email=$_POST["email"];
    $user_name = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
	
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `user_data` WHERE user_name = '$user_name'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
        // $exists = false; 
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user_data` (`first_name`, `last_name`, `email`, `user_name`, `password`, `date_time`) VALUES ('$firstname', '$lastname','$email','$user_name', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
				// header("Location:details.php");
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
	 
	header("Location:details.php");
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
	
    ?>
	<img class="logo" src="img/logo.jpeg"> <!--Logo-->
 	<img class="wave" src="img/wave.png">  <!--Backgound-->
	<div class="container">
		<div class="img">
			<img src="img/pic1.png">  <!--Side image-->
		</div>
		<div class="login-content">
				<form action="signup.php" method="post">
				<h2 class="title">Registration</h2>

				<div class="input-group" >
					<div class="input-div">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>First Name</h5>
							<input type="text" class="input" name="firstname">
						</div>
					</div>
					<div class="input-div">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Last Name</h5>
							<input type="text" class="input"name="lastname">
						</div>
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-envelope"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="email" class="input"name="email">
					</div>
				</div>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" >
            	   </div>
            	</div>
            	<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input type="password" class="input" name="cpassword">
            	   </div>
            	</div>
            	<a href="login.php" class="account">Already have an account?</a>
            	<input type="submit" class="btn" value="Register">
            </form>
   	</div>
   </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
