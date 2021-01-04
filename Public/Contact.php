<?php
session_start();
/*if (!isset($_SESSION['views'])) {
  $_SESSION['views'] = 0;
} else {
  $_SESSION['views']++;
}
 echo $_SESSION['views'];*/
include('../Database/Query/Inquiry.php');
require('../Connection/Verification.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../Css/nav.css">
<link rel="stylesheet" type="text/css" href="../Css/Contact.css">
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap-min.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery-1.12.2.min.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/npm.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
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
				        						<li><a href="Profile.php">My Profile</a></li>
				        						<li><a href="EditProfile.php" class = "logout">Edit Profile</a></li>
				        						<li><a href="Logout.php">Logout</a></li>
				        					</ul>
					
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
		<p class = "page-title">Contact Us</p>
		<p class = "sub-title">We are accepting and answering<br>Questions and Inquiries.</p>
	</div>
</div>

<div class = "bg-contact">
	<div class = "container border-contact">
		<div class ="row">
			<div class = "col-md-8 bg-form">
				<div class ="row">
					<div class = "col-sm-6">
						<h3 class = "contact-title">Send us a Message</h3>
					</div>
					<div class = "col-sm-6">
						<img src = "../Images/Mail-Icon.png" class = "Mail-Icon" align = "right">
					</div>
				</div>
					<form method = "post">
						<div class = "form-group col-sm-6">
							<p class = "input-title">Your Name</p>
							<input class="input-control" id="name" name="Name"  type="text" required>
						</div>
						<div class = "form-group col-sm-6">
							<p class = "input-title">Email Address</p>
							<input class="input-control" id="name" name="Email"  Address" type="text" required>
						</div>	
						<div class = "form-group col-sm-12">
							<p class = "input-title">Contact Number</p>
							<input class = "input-control" id="name" name="Contact" Number" type="text" required>
						</div>
						<div class = "form-group col-sm-12">
							<p class = "input-title">Comments or Inquiry</p>
							<textarea class= "input-control-textarea" id="comments" name="Comment" rows="5"></textarea>
						</div>
						<div class = "form-group col-sm-12">
							<button type="submit" name="Inquiry"  align = "right"><img src="../Images/EmailSent.png" alt="SomeAlternateText" class = "EmailSent" ></button>
							<br>
							
						</div>
													
					</form>
				</div>
				<div class = "col-md-4 bg-contact-info">
					<div class = "container-fluid info-container">
						<div class = "center-info">
							<p class = "info-title text-center">Contact Information</p>
							<div class = "row">
								<div class = "col-sm-2">
									<img src = "../Images/Location-green.png" class = "location-green">
								</div>
								<div class = "col-sm-10">
									<p class = "info-address">Villa Esperanza Magdiwang,<br>
								Molino II Bacoor Cavite</p>
								</div>
							</div>
							<div class = "row">
								<div class = "col-sm-2">
									<img src = "../Images/Contact-green.png" class = "contact-green">
								</div>
								<div class = "col-sm-10">
									<p class = "info-contact">0906-176-7028<br>0908-626-8360<br>0956-443-7349</p>
								</div>
							</div>
							<div class = "row">
								<div class = "col-sm-2">
									<img src = "../Images/mail-green.png" class = "location-green">
								</div>
								<div class = "col-sm-10">
									<p class = "info-email">jeremedavis77@y.com<br>jeremedavis1977@yahoo.com</p>
								</div>
							</div>

						</div>
					</div>
								</div>
	</div>
</div>
</div>




<footer class = "text-center">
	<a href="Home.php"><img  src="../Images/Logo-for-website-2.png"></a>
	<p class ="footerText">© 2017 | Jereme Davis</p>
</footer>

</body>
</html>






