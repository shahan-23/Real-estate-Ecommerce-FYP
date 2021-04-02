<?php 
	
if (isset($_POST["submit"])) {
	
		$email = $_POST["email"];
		$name = $_POST["name"];
		$voterid = $_POST["voterid"];
		$pwd = $_POST["pwd"];
		$pwdRepeat = $_POST["pwdrepeat"];

		require_once 'dbh.inc.php';
		require_once 'functions.inc.php';

		if (pwdMatch($pwd, $pwdRepeat) !== false) {
			header("location: ../index.php?error=passwordsdontmatch");
			exit();
		}

		if (uidExists($conn, $email) !== false) {
			header("location: ../index.php?error=emailalreadyexists");
			exit();
		}

		createUser($conn, $email, $name, $voterid, $pwd);


}
else{
	header("location: ../index.php");
	exit();
}