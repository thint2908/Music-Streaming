let register = document.getElementById("register");
let login = document.getElementById("login-btn");
let registerForm = document.getElementById("register-form");
let loginForm = document.getElementById("login-form");

login.addEventListener("click", function () {
	// alert("ahihi");
	loginForm.style.display = "block";
	registerForm.style.display = "none";
	// $("#login-form").show();
	// $("#register-form").hide();
});
register.addEventListener("click", function () {
	// alert("ahihi");

	loginForm.style.display = "none";
	registerForm.style.display = "block";
	// $("#login-form").hide();
	// $("#register-form").show();
});

// handle login form
$("#login").submit(function (e) {
	e.preventDefault();
	$.ajax({
		type: "post",
		url: "./api/login.php?v=1",
		data: $(this).serialize(),
		success: function (response) {
			let jsonData = JSON.parse(response);
			if (jsonData.statusCode === 200) {
				location.href = "index.php";
				$(".user-name").text(jsonData.userName);
			}
			if (jsonData.statusCode === 400) {
				alert(jsonData.message);
			}
		},
	});
});
// ./handle login form
