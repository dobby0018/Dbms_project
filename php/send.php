

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

session_start();

if(isset($_SESSION["email"])){
    $otp=rand(111111,999999);
    $_SESSION['otp']=$otp;
    $mail= new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='abhinavlotlikar48@gmail.com';
    $mail->Password='kutrlmlhsafkocfr';
    $mail->SMTPSecure='ssl';
    $mail->Port       = 465; 


    //Recipients
    $mail->setFrom('abhinavlotlikar48@gmail.com','leaplearn');
    $mail->addAddress($_SESSION['email']);     
    

    
    $mail->isHTML(true);                                  
    $mail->Subject = "Account verification!";
    $mail->Body ="your otp: $otp";
    

    $mail->send();
    if(isset($_SESSION['firstname']))
    {header("location:php/otp.php");}
    else
    {
    header("location:php/forgot_php/otp.php");}
}




?>