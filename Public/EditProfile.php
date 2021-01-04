<?php
session_start();
	include("../Database/Query/Profiler.php");
	include("../Database/Query/ViewProfile.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../Css/EditProfile.css">
<link rel="stylesheet" type="text/css" href="../Css/nav.css">
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



<div class = "editprofile">
	<div class = "container ProfileInfo">
		<form method= "POST">
			<div class = "row">
				<p class = "editprofiletitle">Edit Profile</p>
				<p class= "editprofileinfo">Please make sure details is correct.</p>
				<?php 
							if(empty($errorsSignUp) === false){
								foreach ($errorsSignUp as $error) {
								echo '<ul>';	
								echo '<li>',$error,'</li>';
								echo '</ul>';
								}
							}
							else{
								if(isset($_SESSION['msg'])){
								echo $_SESSION['msg'];
								echo $_SESSION['msg'] = '';
							}

							}
							?>
					<div class = "col-md-2">
						<label>Firstname</label>
					</div>
					<div class = "col-md-4">
						<div class = "form-group input-group-md">
							<input type="text" class="form-control input-md" name="firstname" placeholder="Firstname" value = "<?php echo $firstname; ?>">
						</div>
					</div>
					<div class = "col-md-6">
					</div>
				</div>
				<div class = "row">
					<div class = "col-md-2">
						<label>Lastname</label>
					</div>
					<div class = "col-md-4">
						<div class = "form-group input-group-md">
							<input type="text" class="form-control input-md" name="lastname" placeholder="Lastname" value = "<?php echo $lastname; ?>">
						</div>
					</div>
					<div class = "col-md-6">
					</div>
				</div>
				<div class = "row">
					<div class = "col-md-2">
						<label>Contact Number</label>
					</div>
					<div class = "col-md-4">
						<div class = "form-group input-group-md">
							<input type="text" class="form-control input-md" name="contact" placeholder="Contact" value = "<?php echo $contact; ?>">
						</div>
						
					</div>
					<div class = "col-md-6">
					</div>
				</div>
				<div class = "row">
					<div class = "col-md-2">
						<label>Address</label>
					</div>
					<div class = "col-md-4">
						<div class = "form-group input-group-md">
							<input type="text" class="form-control input-md" name="address" placeholder="Address" value = "<?php echo $address; ?>">
						</div>
					</div>
					<div class = "col-md-6">
					</div>
				</div>
				<div class = "form-group">
					<button type="submit" name="profile" >Submit</button>
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






