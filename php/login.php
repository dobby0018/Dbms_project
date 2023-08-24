
<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'php/_dbconnect.php';
    $user_name = $_POST["username"];
    $password = $_POST["password"]; 
    
     
   
    $sql = "SELECT * from `user_data` WHERE user_name='$user_name'";
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result);
    
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user_name;
                header("location: php/welcome.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
if ($login) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
}
if ($showError) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
}
?>
<script>
// Close alert when close button is clicked
document.addEventListener("DOMContentLoaded", function() {
    var closeButtonList = document.querySelectorAll(".alert button.close");
    closeButtonList.forEach(function(button) {
        button.addEventListener("click", function() {
            var alert = button.closest(".alert");
            alert.style.display = "none";
        });
    });
});

</script>


	<img class="logo" src="img/logo.jpeg">
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/pic2.png">
		</div>
		<div class="login-content">
			<form action="php/login.php" method="post">
				<h2 class="title">Welcome</h2>
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
           		    	<input type="password" class="input"name="password">
            	   </div>
            	</div>
            	<div class="login-links">
														<a href="php/forgot.php">Forgot Password?</a>
														<a href="php/signup.php">Create Account?</a>
            	</div>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
