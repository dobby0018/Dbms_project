<?php
session_start();
include 'php/_dbconnect.php';
$user_otp=($_POST['k1'])*100000+($_POST['k2'])*10000+($_POST['k3'])*1000+($_POST['k4'])*100+($_POST['k5'])*10+($_POST['k6']);
$otp=$_SESSION['otp'];
$firstname=$_SESSION["firstname"];
	$lastname=$_SESSION["lastname"];
	$email=$_SESSION["email"];
    $user_name = $_SESSION["username"];
    $password = $_SESSION["password"];
    $cpassword = $_SESSION["cpassword"];
if($user_otp==$otp)
{
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user_data` (`first_name`, `last_name`, `email`, `user_name`, `password`, `date_time`) VALUES ('$firstname', '$lastname','$email','$user_name', '$hash', current_timestamp())";
    $result = mysqli_query($conn, $sql);
	session_unset();
    session_destroy();
	header("location:php/details.php");
}
else
{
	echo"
	<script>
    alert('enter valid otp');
    document.location.href='php/otp.php';
    </script>
    ";
}