<?php

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dBName = "phpproject01";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dBName);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}