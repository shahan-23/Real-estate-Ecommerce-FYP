<?php 

session_start();
unset($_SESSION['UserEmail']);
session_destroy();

header("location: ../index.php");
exit();