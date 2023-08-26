// Add 'focus' class to the parent div when input gains focus
function addcl() {
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

// Remove 'focus' class from parent div when input loses focus and has no value
function remcl() {
	let parent = this.parentNode.parentNode;
	if (this.value === "") {
					parent.classList.remove("focus");
	}
}

// Attach 'focus' and 'blur' event listeners to input elements
const inputs = document.querySelectorAll(".input");
inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

// Add event listener to password input and check its strength
const myInput = document.getElementById("psw");
const passwordConditions = document.getElementById("test");
const letter = document.getElementById("letter");
const capital = document.getElementById("capital");
const number = document.getElementById("number");
const length = document.getElementById("length");

myInput.addEventListener("focus", function () {
	passwordConditions.style.display = "block"; // Show password strength conditions
});

myInput.addEventListener("blur", function () {
	passwordConditions.style.display = "none"; // Hide password strength conditions when focus is lost
});

myInput.addEventListener("input", function () {
	const lowerCaseLetters = /[a-z]/g;
	if (myInput.value.match(lowerCaseLetters)) {
					letter.classList.remove("invalid");
					letter.classList.add("valid");
	} else {
					letter.classList.remove("valid");
					letter.classList.add("invalid");
	}

	const upperCaseLetters = /[A-Z]/g;
	if (myInput.value.match(upperCaseLetters)) {
					capital.classList.remove("invalid");
					capital.classList.add("valid");
	} else {
					capital.classList.remove("valid");
					capital.classList.add("invalid");
	}

	const numbers = /[0-9]/g;
	if (myInput.value.match(numbers)) {
					number.classList.remove("invalid");
					number.classList.add("valid");
	} else {
					number.classList.remove("valid");
					number.classList.add("invalid");
	}

	if (myInput.value.length >= 8) {
					length.classList.remove("invalid");
					length.classList.add("valid");
	} else {
					length.classList.remove("valid");
					length.classList.add("invalid");
	}
});

// Add event listener to "Confirm Password" input and check if passwords match
const confirmPswInput = document.getElementById("confirmPsw");
const passwordMatchMessage = document.getElementById("password-match-message");

confirmPswInput.addEventListener("focus", function () {
	passwordMatchMessage.style.display = "block";
});

confirmPswInput.addEventListener("blur", function () {
	passwordMatchMessage.style.display = "none";
});

confirmPswInput.addEventListener("click", function () {
	passwordMatchMessage.style.display = "block";
});

confirmPswInput.addEventListener("input", function () {
	const passwordInput = document.getElementById("psw");

	if (confirmPswInput.value === passwordInput.value) {
					passwordMatchMessage.innerHTML = "";
					passwordMatchMessage.classList.remove("active");
	} else {
					passwordMatchMessage.innerHTML = "Passwords do not match";
					passwordMatchMessage.classList.add("active");
	}
});
