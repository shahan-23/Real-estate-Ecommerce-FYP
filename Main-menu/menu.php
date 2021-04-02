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
	<title>Main Menu</title>
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
				<li><a href="#">Home</a></li>
				<li><a href="#about">About us</a></li>
				<li><a href="#properties">Properties</a></li>
				<li><a href="#services">Services</a></li>
				<li><a href="#contact">Contact</a></li>
			 
				<li><a href="account.php" class="active">Profile Management</a></li>
				<li><a href="../includes/logout.inc.php" class="active">Log out</a></li>

				<li class="menu">Close</li>
			</ul>
			<div class="menu">Menu</div>
		</header>


		<!-------------------------Section----------------------->


		<section>
			
			<div class="banner">
				<div class="thumb">
					<img src="./images/dhaka2.jpg" alt="">
					<img src="./images/dhaka.jpg" alt="">
					<img src="./images/dhaka3.jpg" alt="">
					<img src="./images/dhaka1.jpg" alt="">
					<img src="./images/dhaka5.jpg" alt="">
				</div>
				<div class="text">
					<h2>Find your dream home today</h2>
					<p>Welcome to Roof Site!</p>
				<form>
					<input type="text" name="srch" id="srch"
					required placeholder="Location">
					<button type="submit">Find</button>
				</form>
			</div>
			<div class="prev"> &lt; </div>
			<div class="next"> &gt; </div>
			<div class="slide-nav">
				<div class="nav-dot dot-active">1</div>
				<div class="nav-dot">2</div>
				<div class="nav-dot">3</div>
				<div class="nav-dot">4</div>
				<div class="nav-dot">5</div>
			</div>
		</div>


		<!-----------------About Section-------------->


		<div id="about">
			<h2>About us</h2>
			<div class="content">
				<div class="text">
					<h3>Roof Site</h3>
					<p>Welcome to our website. Here, we bring the customers and the sellers together in one platform to do real-estate business. Our platform is based on the mother company, "Banani Property Development LTD".</p>
					<p>Office:<br>
						Golden Plaza, (3rd Floor)<br>
						Plot No. 34, Road No. 46<br>
						Gulshan Circle-2<br>
						Dhaka-1212.
					</p>

				</div>
				<div class="thumb">
					<div class="thumb-box">
						<img src="./images/logo-long.png" width="250px">
						<h3>Mother company: Banani Property Development LTD</h3>
					</div>
				</div>
			</div>
		</div>


		<!-----------------Properties Section-------------->


		<div id="properties">
			
			<h2>Hot properties (for sale)</h2>
			<div class="content">

				<div class="box">
					<img src="./images/sale11.jpg">
					<div class="text">
						<h3>Property 1</h3>
						<span>BDT 1 crore 45 lac</span>
						<p>Dhanmondi, Dhaka.</p>
						<div class="details">
							<span>1700 sq ft</span>
							<span>3 bedrooms</span>
							<span>3 bathrooms</span>
						</div>
					<a href="#">Read more</a>
					</div>
				</div>


				<div class="box">
					<img src="./images/sale12.jpg">
					<div class="text">
						<h3>Property 2</h3>
						<span>BDT 1 crore 70 lac</span>
						<p>Bashundhara, Dhaka.</p>
						<div class="details">
							<span>2260 sq ft</span>
							<span>4 bedrooms</span>
							<span>4 bathrooms</span>
						</div>
					<a href="#">Read more</a>
					</div>
				</div>


				<div class="box">
					<img src="./images/sale13.jpg">
					<div class="text">
						<h3>Property 3</h3>
						<span>BDT 1 crore 20 lac</span>
						<p>Gulshan-2, Dhaka.</p>
						<div class="details">
							<span>2400 sq ft</span>
							<span>3 bedrooms</span>
							<span>4 bathrooms</span>
						</div>
					<a href="#">Read more</a>
					</div>
				</div>


			</div>
			<a href="#" class="view">View All Properties</a>
		</div>



		<!----------------------Services------------------->


		<div id="services">
			<h2>OUR SERVICES</h2>
			<p>This website is targeted for the people of Bangladesh. Our goal is to to bring the buyers and sellers come to a common online platform. This platform is an e-commerce site for buying, selling or renting land properties, apartments or houses.
			</p>
			<div class="content">

				<div class="card">
					<i class="fa fa-map-marker"></i>
					<h3>Find Budget Friendly Houses</h3>	
				</div>

				<div class="card">
					<i class="fa fa-users"></i>
					<h3>We Have Agents With Experience</h3>	
				</div>

				<div class="card">
					<i class="fa fa-building"></i>
					<h3>Buy Or Rent Sales Properties</h3>	
				</div>

				<div class="card">
					<i class="fa fa-mixcloud"></i>
					<h3>Find New Homes On The Go</h3>	
				</div>

			</div>


			<div class="content">

				<div class="card">
					<img src="./images/services1.jpg">
					<h3>Convenience</h3>
					<p>Our goal is to build a convenient and easy to use e-commerce site so that the people of Bangladesh can easily access and use it without any complexity.

					</p>
				</div>

				<div class="card">
					<img src="./images/services2.jpg">
					<h3>Hand-pick</h3>
					<p>People can browse and search for their desired houses. While searching they can sort according to location, price range, apartment arrangement, property type etc.
					</p>
				</div>

				<div class="card">
					<img src="./images/services3.jpg">
					<h3>Security</h3>
					<p>Sellers and buyers need to provide their Voter ID number during registration for user authentication. Thus providing a secured marketplace for both buyers and sellers.
					</p>
				</div>

			</div>

		</div>



		<!-------------------Contact-------------------->



		<div id="contact">
			<h2>Contact Us</h2>
			<div class="content">
				<form>
					<input type="text" name="name" id="name" 
					required placeholder="Your name">
					<input type="email" name="mail" id="mail" 
					required placeholder="Your email">
					<input type="tel" name="tel" id="tel" 
					required placeholder="Phone Number">
					<textarea name="mess" id="mess" rows="7" 
					placeholder="Your message here..."></textarea>
					<button type="submit">Send <i class="fa fa-paper-plane"></i></button>
				</form>

				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.6183378333344!2d90.40968421493395!3d23.796601584566744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7083cb00001%3A0x9d3b138911c5197e!2z4KaX4KeL4Kay4KeN4Kah4KeH4KaoIOCmquCnjeCmsuCmvuCmnOCmviDgprbgpqrgpr_gpoIg4KaV4Kau4Kaq4KeN4Kay4KeH4KaV4KeN4Ka4!5e0!3m2!1sen!2sbd!4v1609675707810!5m2!1sen!2sbd" height="386" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
			<div class="box">


				<div class="text">
					<h3><i class="fa fa-comments"></i>COMMUNICATION</h3>
					<p>For General Queries, Including Property Sales and Rents, Please 
						Email Us At:<br><span>bananiproperty-bd@gmail.com</span>
					</p>
				</div>


				<div class="text">
					<h3><i class="fa fa-life-ring"></i>TECHNICAL SUPPORT</h3>
					<p>We Are Ready To Help! If You Have Any Queries Or Issues, Contact Us For Support: <br><span>+88 0288 33406</span>
					</p>
				</div>


				<div class="text">
					<h3><i class="fa fa-map"></i>Office visit</h3>
					<p>For Any Assistance And Dealings, Please Visit Our Office At:<br><span>Golden Plaza, (3rd Floor)Plot No. 34, Road No. 46, Gulshan Circle-2, Dhaka-1212.</span>
					</p>
				</div>


			</div>
		</div>


	</section>


	</div>


	<!------------------------Cotainer End---------------------->


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

		
		//Menu toggle for phone		

		const menuToggle = document.querySelectorAll('header .menu');
		const menu = document.querySelector('header ul');
		menuToggle.forEach(item =>{
			item.addEventListener('click', ()=>{
				menu.classList.toggle('menu-toggle');
			})
		})


		//Picture banner slide

		let images, dots, prev, next, banner;
        banner = document.querySelector('.banner');
        images = document.querySelectorAll('.banner img');
        dots = document.querySelectorAll('.banner .nav-dot');
        prev = document.querySelector('.banner .prev');
        next = document.querySelector('.banner .next');

        let slideIndex = 0;
        showSlide(slideIndex);
        function showSlide(n){
            if(slideIndex > images.length-1){
                slideIndex = 0;
            }
            if(slideIndex < 0){
                slideIndex = images.length-1;
            }
            let i;
            for(i=0; i<images.length; i++){
                images[i].style.display = "none";
            }
            for(i=0; i<dots.length; i++){
                dots[i].className = dots[i].className.replace(" dot-active","");
            }
            images[slideIndex].style.display = "block";
            dots[slideIndex].className += " dot-active";
        }
        dots.forEach((item, index)=>{
            item.addEventListener('click', ()=>{
                showSlide(slideIndex = index);
            })
        });
        prev.addEventListener('click',()=>{
            showSlide(slideIndex -= 1);
        });
        next.addEventListener('click',()=>{
            showSlide(slideIndex += 1);
        });
        let run;
        function autoSlide(){
            run = setInterval(()=>{
                showSlide(slideIndex += 1);
            },3000)
        }
        autoSlide();
        banner.addEventListener('mouseover', ()=>{
            clearInterval(run);
            run = null;
        });
        banner.addEventListener('mouseout', ()=>{
            autoSlide();
        });


	</script>


</body>
</html>