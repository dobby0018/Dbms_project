<?php
session_start();
if(!isset($_SESSION['otp']))
{
	header("location:logout.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>OTP verification</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="logo" src="../img/logo.jpeg" >
 <img class="wave" src="../img/wave.png">
	 <div class="container2">  
						<div class="img"> 
							<img src="../img/verify.png">
						</div>
						<div class="login-content-otp">
							<header>
								<i class="bx bxs-check-shield"></i>
							</header>
							<form action="verify.php" method="post">
								<h1>Enter OTP</h1>
								<div class="input-field">
									<input type="number" name="k1"/>
									<input type="number" disabled name="k2"/>
									<input type="number" disabled name="k3"/>
									<input type="number" disabled name="k4"/>
									<input type="number" disabled name="k5"/>
									<input type="number" disabled name="k6"/>
								</div>
								<a href="send.php">Resend OTP?</a>
								<input type="submit" class="btn" value="Verify">
								</form>	
						</div>
    </div>
		<script>const inputs = document.querySelectorAll("input"),
    button = document.querySelector(".btn");

inputs.forEach((input, index1) => {
    input.addEventListener("keyup", (e) => {
        const currentInput = input,
            nextInput = input.nextElementSibling,
            prevInput = input.previousElementSibling;

        if (currentInput.value.length > 1) {
            currentInput.value = "";
            return;
        }

        if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
            nextInput.removeAttribute("disabled");
            nextInput.focus();
        }

        if (e.key === "Backspace") {
            if (prevInput && currentInput.value === "") {
                prevInput.removeAttribute("disabled");
                prevInput.value = "";
                prevInput.focus();
            }
        }

        if (currentInput.value !== "" && nextInput) {
            nextInput.focus(); // Move focus to the next input when a digit is entered
        }

        if (!inputs[5].hasAttribute("disabled")) {
            button.classList.add("active");
        } else {
            button.classList.remove("active");
        }
    });
});

window.addEventListener("load", () => inputs[0].focus());
</script>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>

