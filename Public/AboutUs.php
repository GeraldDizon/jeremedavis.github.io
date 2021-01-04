	<?php
session_start();
require('../Connection/Verification.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/AboutUs.css">
<link rel="stylesheet" type="text/css" href="../Css/nav.css">
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery-1.12.2.min.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/npm.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>

<script src = "../Javascript/ViewRecord.js"></script>
<script src = "../Javascript/Home.js"></script>
</head>

<body>
	<nav class="navbar navbar-inverse">
						    <div class="container-fluid">
						  <!-- This is the code for collapsing navbar-->
						        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						              <span class="icon-bar"></span>
						              <span class="icon-bar"></span>
						              <span class="icon-bar"></span>                        
						        </button>

						      <!-- This is the code for collapsing navbar-->
						      <!-- Collapsing code also (before the closing nav input closing div) -->

						              
						                <div class="collapse navbar-collapse" id="myNavbar">
						  <!-- Collapsing code also (before the closing nav input closing div)-->
						                  <ul class="nav navbar-nav" >
						                    <li><a href="Home.php">Home</a></li>
						                    <li><a href="Collection.php">Collection</a></li>
											<li><a href="AboutUs.php">About Us</a></li>
						                    <li><a href="Contact.php">Contact Us</a></li>



						                 	<?php if(isset($_SESSION['Email'])){ ?>
											<li class="dropdown">
				        					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
				        					<span class="caret"></span></a>
											<!--if Logged in show Logout if logged out show Accounts page-->
											<ul class="dropdown-menu">
				        						<li><a href="Profile.php" class = "profile">My Profile</a></li>
				        						<li><a href="EditProfile.php" class = "logout">Edit Profile</a></li>
				        						<li><a href="Logout.php" class = "logout">Logout</a></li>
				        					</ul>
											</li>
											<?php 
											}
											else{?>
												<li><a href="Account.php">Account</a></li>
											<?php } ?>
	 										<!--If logged in show cart if logged out hide cart-->
											<?php if(isset($_SESSION['Email'])){ ?>
												<li><a href="Cart.php">Cart</a></li>
											<?php 
											}
											else{
	 										} 
	 										?>
						              </div>
					    	</div>
				  	</nav>










<div class = "container-fluid title-background  text-center">						    	
	<p class = "main-title">Jereme Davis</p>
</div>


<div class = "background-main">
	<div class = "container text-center">
		<p class = "page-title">About Us</p>
		<p class = "sub-title">Know More<br>Learn More About Us.</p>
	</div>
</div>




<div class = "bg-trio">
	<div class = "container text-center">
		<p class ="text-center featured-title">Our Services</p>
		<p class = "text-center featured-subtitle">Things We Can Offer to Our Customers</p>	
		<div class = "col-md-4">
			<div class = "border-service">
				<img src ="../Images/QualityCheck.png" class = "service-image">
				<p class = "service-title">High Quality</p>
				<p class = "service-subtitle">We offer products which follows <br>standard quality and in a trend designs.</p>
			</div>
		</div>
		<div class = "col-md-4">
			<div class = "border-service">
				<img src ="../Images/FastTransaction.png" class = "service-image">
				<p class = "service-title">Fast Delivery</p>
				<p class = "service-subtitle">Ordering products made easy<br> hassle free, orders will be delivered quickly.</p>
			</div>
		</div>
		<div class = "col-md-4">
			<div class = "border-service">
				<img src ="../Images/ReliableCustomerService.png" class = "service-image">
				<p class = "service-title">Customer Support</p>
				<p class = "service-subtitle">We take and answer questions, <br>problems and inquiries .</p>
			</div>
		</div>
	</div>
</div>




<div class = "bg-featured">
	<div class = "container text-center">
		<p class ="text-center featured-title">Follow us On</p>
		<p class = "text-center featured-subtitle">Keep In Touch With Us</p>	
			<img src ="../Images/facebookfollow.png" class = "service-image">
	</div>
</div>







<footer class = "text-center">
	<a href="Home.php"><img  src="../Images/Logo-for-website-2.png"></a>
	<p class ="footerText">© 2017 | Jereme Davis</p>
</footer>





</body>
</html>


