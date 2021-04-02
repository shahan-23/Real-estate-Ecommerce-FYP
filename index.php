<!DOCTYPE html>
<html>
<head>
	<title>Landing page</title>
	<link rel="icon" href="./Main-menu/images/logo.png">
	<meta name="Viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="style1.css">

</head>
<body>
	
	<div class = "basic">
		<p>Welcome to Roof Site!</p>
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Log In</button>
				<button type="button" class="toggle-btn" onclick="register()">Register</button>
			</div>
			<div class="weblogo">
			<img src="./Main-menu/images/logo.png">
		</div>

		<form id="login" class="input-group" action="includes/login.inc.php" method="post">
			<input type="text" class="input-field" name="email" placeholder="Email address" required>
			<input type="password" class="input-field" name="pwd" placeholder="Password" required>
			<button type="submit" name="submit" class="submit-btn">Log In</button>
		</form>

		<form id="register" class="input-group" action="includes/signup.inc.php" method="post">
			<input type="text" class="input-field" name="email" placeholder="Email address" required>
			<input type="text" class="input-field" name="name" placeholder="Full Name" required>
			<input type="text" class="input-field" name="voterid" placeholder="Voter Id number" required>
			<input type="password" class="input-field" name="pwd" placeholder="Enter Password" required>
			<input type="password" class="input-field" name="pwdrepeat" placeholder="Repeat Password" required>
			<button type="submit" name="submit" class="submit-btn">Register</button>
		</form>

		</div>
	</div>


	<script>
		var x = document.getElementById("login");
		var y = document.getElementById("register");
		var z = document.getElementById("btn");

		function register(){
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}

		function login(){
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0";
		}

	</script>

</body>
</html>