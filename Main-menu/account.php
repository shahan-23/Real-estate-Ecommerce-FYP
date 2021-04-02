<?php 

	session_start();	
	if ($_SESSION['UserEmail']) {
		$_SESSION["UserEmail"];
	}else{
		header("location: ../index.php");
		exit();
	}

	$email = $_SESSION['UserEmail'];


	include_once '../Includes/dbh.inc.php';

	$sql3 = "SELECT * FROM users WHERE usersEmail = '$email'";
	$result = mysqli_query($conn, $sql3);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);

	foreach ($data as $row){
		$usver = $row['usersID'];
		$usemail = $row['usersEmail'];
		$usname = $row['usersName'];
		$usid = $row['usersNid'];
	}


 ?>


<!DOCTYPE html>
<html>
<head>

	

	<title>Profile Menu</title>
	<meta charset="utf-8">
	<link rel="icon" href="./images/logo.png">
	<meta name="Viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style2.css">

</head>
<body>

	<div class="container">
		<header>
			<div class="logo">
				<img src="./images/logo.png" width="100px" alt="">
			</div>
			<ul>
				<li><a href="menu.php">Home</a></li>
				<li><a href="menu.php#about">About us</a></li>
				<li><a href="menu.php#properties">Properties</a></li>
				<li><a href="menu.php#services">Services</a></li>
				<li><a href="menu.php#contact">Contact</a></li>

			
				<li><a href="#" class="active">Profile Management</a></li>
				<li><a href="../includes/logout.inc.php" class="active">Log out</a></li>


				<li class="menu">Close</li>
			</ul>
			<div class="menu">Menu</div>
		</header>



		<div id="about">
			<h2>Account Info</h2>
			<div class="content">
				<div class="text">
					<h3>Account ID:</h3>
					<p><?php echo $usver; ?></p><br>

					<h3>User Email Address:</h3>
					<p><?php echo $usemail; ?></p><br>

					<h3>User Name:</h3>
					<p><?php echo $usname; ?></p><br>

					<h3>User Voter ID Number:</h3>
					<p><?php echo $usid; ?></p><br><br>
					

				</div>
				
				<div class="thumb">
					<div class="thumb-box">
						<img src="./images/delete.png">
						<br>
						<a href="deleteacc.php"><h3>Delete Account?</h3></a>
					</div>
				</div>

			</div>
		</div>
	</div>




<!-------------------------------Footer-------------------------------->





		<footer>

		<div class="content">


			<div class="box">
				<h2>WHO WE ARE</h2>
				<p>We are an experienced group of people who have been doing real-estate business for the last 30 years. Our goal is to connect the real-estate agents with the appropiate buyers and accomplish this in the form of easy and convenient web platform.</p>
				<h3>Trusted by more than 1000+ people</h3>
			</div>


			<div class="box">
				<h2>CONTACT US</h2>
				<h3><i class="fa fa-map-marker"></i> Location</h3>
				<p>Golden Plaza, (3rd Floor)Plot No. 34, Road No. 46, Gulshan Circle-2, Dhaka-1212.</p>
				<h3><i class="fa fa-phone"></i> Phone</h3>
				<p>+88 0288 33406</p>
				<h3><i class="fa fa-envelope-o"></i> Email</h3>
				<p>bananiproperty-bd@gmail.com</p>
			</div>


			<div class="box">
				<h2>LATEST NEWS</h2>
				<h3><i class="fa fa-facebook"></i> Banani Properties LTD</h3>
				<p>Follow our Facebook page to keep up-to-date with latest announcements, promotions, dealings etc.</p>
			</div>


		</div>

		<div class="row">
			<p> &copy; 2020 Roof Site. All Rights Reserved | Design by <span>Shahan</span></p>
			<div class="social">
				<a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i> Facebook</a>
				<a href="https://twitter.com/explore" target="_blank"><i class="fa fa-twitter"></i> Twitter</a>
				<a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i> Instagram</a>
				<a href="https://bd.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i> Linkedin</a>
			</div>
		</div>


	</footer>

	<div class="top-scroll">
		<a href="#"> &#11165; </a>
	</div>

	<script>
		
		const menuToggle = document.querySelectorAll('header .menu');
		const menu = document.querySelector('header ul');
		menuToggle.forEach(item =>{
			item.addEventListener('click', ()=>{
				menu.classList.toggle('menu-toggle');
			})
		})


		
	</script>
	

	</body>
</html>