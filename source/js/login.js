let register = document.getElementById("register");
let login = document.getElementById("login");
let registerForm = document.getElementById("register-form");
let loginForm = document.getElementById("login-form");

login.addEventListener("click", function () {
	loginForm.style.display = "block";
	registerForm.style.display = "none";
});
register.addEventListener("click", function () {
	loginForm.style.display = "none";
	registerForm.style.display = "block";
});
