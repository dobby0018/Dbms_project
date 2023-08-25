<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location:forgot.php");
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
							<form action="verify_2.php" method="post">
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
		<script> const inputs = document.querySelectorAll("input"),
			button = document.querySelector("button");
		

		inputs.forEach((input, index1) => {
			input.addEventListener("keyup", (e) => {
				// This code gets the current input element and stores it in the currentInput variable
				// This code gets the next sibling element of the current input element and stores it in the nextInput variable
				// This code gets the previous sibling element of the current input element and stores it in the prevInput variable
				const currentInput = input,
					nextInput = input.nextElementSibling,
					prevInput = input.previousElementSibling;
		
				// if the value has more than one character then clear it
				if (currentInput.value.length > 1) {
					currentInput.value = "";
					return;
				}
				// if the next input is disabled and the current value is not empty
				//  enable the next input and focus on it
				if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
					nextInput.removeAttribute("disabled");
					nextInput.focus();
				}
		
				// if the backspace key is pressed
				if (e.key === "Backspace") {
					// iterate over all inputs again
					inputs.forEach((input, index2) => {
						// if the index1 of the current input is less than or equal to the index2 of the input in the outer loop
						// and the previous element exists, set the disabled attribute on the input and focus on the previous element
						if (index1 <= index2 && prevInput) {
							input.setAttribute("disabled", true);
							input.value = "";
							prevInput.focus();
						}
					});
				}
				//if the fourth input( which index number is 3) is not empty and has not disable attribute then
				//add active class if not then remove the active class.
				if (!inputs[5].disabled && inputs[5].value !== "") {
					button.classList.add("active");
					return;
				}
				button.classList.remove("active");
			});
		});
		
		//focus the first input which index is 0 on window load
		window.addEventListener("load", () => inputs[0].focus());</script>
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>
