<?php


function pwdMatch($pwd, $pwdRepeat){
	$result;

	if ($pwd != $pwdRepeat) {
		$result = true;
	} 
	else{
		$result = false;
	}
	return $result;
}


function uidExists($conn, $email){
	$sql = "SELECT * FROM users WHERE usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../index.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);

}


function createUser($conn, $email, $name, $voterid, $pwd){
	$sql = "INSERT INTO users (usersEmail, usersName, usersNid, usersPwd) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../index.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss", $email, $name, $voterid, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);



	header("location: ../index.php?AccountRegistered");
	exit();

}


function loginUser($conn, $email, $pwd){
	$uidExists = uidExists($conn, $email);

	if ($uidExists === false) {
		header("location: ../index.php?error=AccountDoesNotExist");
		exit();
	}

	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../index.php?error=PasswordIncorrect");
		exit();
	}
	
	
	else if ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["usersID"];
		$_SESSION["UserEmail"] = $uidExists["usersEmail"];
		header("location: ../Main-menu/menu.php");
		exit();


	}

}