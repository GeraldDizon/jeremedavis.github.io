<?php
session_start();
if(isset($_SESSION['Email'])){
	header("Location: ../Public/Home.php");
}
	require("../Database/Query/login.php");
	require("../Database/Query/signUp.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../Css/Account.css">
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
						<ul class="nav navbar-nav">
							<li><a href="Home.php">Home</a></li>
							<li><a href="Collection.php">Collection</a></li>
							<li><a href="AboutUs.php">About Us</a></li>
							<li><a href="Contact.php">Contact Us</a></li>



							<?php if(isset($_SESSION['Email'])){ ?>
							<li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
					        <span class="caret"></span></a></li>
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
						</ul>
					</div>
				</div>
	</nav>



				  	

<div class = "container-fluid title-background  text-center">						    	
	<p class = "main-title">Jereme Davis</p>
</div>






<div class = "bg-sign">
	<div class = "container">
		<div class = "row">
			<div class = "col-md-6">
				<div class ="bg-login">
					<p class = "form-title">Login</p>
					<hr>
							<form method="post">
								<?php 
									if(empty($errorLogin) === false){
										foreach ($errorLogin as $errors){
											echo '<ul>';	
											echo '<li>',$errors,'</li>';
											echo '</ul>';
										}
									}
								?>
								<div class = "form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control input-sm" id="loginEmail" name="loginEmail" placeholder="Email Address:" value = "<?php if(isset($Email)){echo $Email;}?>" autocomplete="off">
								</div>
								<div class = "form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input type="password" class="form-control input-sm" id="loginPass" name="loginPass" placeholder="Password" autocomplete="off">
								</div>
								<input type="submit" class="btn btn-primary btn-md" name = "login" name = "login" value = "Login">
							</form>
				</div>
			</div>
			<div class ="col-md-6">
				<div class ="bg-register">
					<p class = "form-title">Register</p>
					<hr>
						<form  name="myForm" role="form" method="post">
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
							<div class ="row">
								<div class = "col-md-6">
									<div class = "form-group input-group-sm">
										<input type="text" class="form-control input-sm" name="firstname" placeholder="Firstname" value = "<?php if(isset($EmailAddress)){echo $Firstname; }?>">
									</div>
								</div>
								<div class = "col-md-6">
									<div class = "form-group input-group-sm">
										<input type="text" class="form-control input-sm" name="lastname" placeholder="Lastname:" value = "<?php if(isset($EmailAddress)){echo $Lastname; }?>">
									</div>
								</div>
							</div>
							<div class = "form-group input-group-sm">
								<input type="text" class="form-control input-sm" name="contact" placeholder="Contact Number" value = "<?php if(isset($EmailAddress)){echo $Contact; }?>">
							</div>
							<div class = "form-group input-group-sm">
								<input type="text" class="form-control input-sm" name="address" placeholder="Address" value = "<?php if(isset($EmailAddress)){echo $Address; }?>">
							</div>
							<div class = "form-group input-group-sm">
								<input type="text" class="form-control input-sm" name="email" placeholder="Email Address:" value = "<?php if(isset($EmailAddress)){echo $EmailAddress; }?>">
							</div>
							<div class = "form-group input-group-sm">
								<input type="password" class="form-control input-sm" name="password" placeholder="Password:">
							</div>
							<div class = "form-group input-group-sm">
								<input type="password" class="form-control input-sm" name="ConfirmPassword" placeholder="Confirm Password:">
							</div>
							<input type="submit" class="btn btn-primary btn-md" name = "signUp" value = "Signup">
						</form>
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






