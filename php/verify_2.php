<?php
session_start();
include '_dbconnect.php';
if(isset($_SESSION["username"])){
$user_otp=($_POST['k1'])*100000+($_POST['k2'])*10000+($_POST['k3'])*1000+($_POST['k4'])*100+($_POST['k5'])*10+($_POST['k6']);
$otp=$_SESSION['otp'];

    
    
if($user_otp==$otp)
{
    
	header("location:newpassword.php");
}
else
{
	echo"
	<script>
    alert('enter valid otp');
    document.location.href='forgot_otp.php';
    </script>
    ";
}
}