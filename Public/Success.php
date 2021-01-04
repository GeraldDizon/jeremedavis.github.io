<?php
	session_start();

	/*require_once('../Connection/Redirect.php');
	if (!isset($_SESSION['views'])) {
	  $_SESSION['views'] = 0;
	} else {
	  $_SESSION['views']++;
	}
	 echo $_SESSION['views'];*/
	 include("../Database/Query/ViewCart.php");
	$id =  $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../Css/nav.css">
<link rel="stylesheet" type="text/css" href="../Css/Success.css">
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap-min.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery-1.12.2.min.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/npm.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script rel="stylesheet" type="text/javascript" src="../Javscript/CartSum.js"></script>
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


<div class = bg-order>
	<div class = "container">
		<div class = "bg-process text-center">
			<div class = "col-xs-2">
				<p class = "cart-directory">Cart</p>
			</div>
			<div class = "col-xs-3">
				<div class = "pathway1">
				</div>
			</div>
			<div class = "col-xs-2">
				<p class = "review-directory">Review & Payment</p>
			</div>
			<div class = "col-xs-3">
				<div class = "pathway2">
				</div>
			</div>
			<div class = "col-xs-2">
				<p class = "success-directory">Success</p>
			</div>
		</div>
	</div>

	<div class = "container text-center">
		<div class = "row">
			<h1>THANK<br>YOU</h1>
			<p class = "order-number">ORDER ID: <?php echo $id ?></p>
			<p class = "order-msg">Your order is being processed</p>
			<a href = "Home.php" class = "order-btn">Return to Home</a>
			<input type = "hidden" name = "OrderDate" value = "<?php $current_date ?>">
			<p name = "OrderDate"><?php $current_date ?></p>
		</div>
	</div>
</div>


<footer class = "text-center">
	<a href="Home.php"><img  src="../Images/Logo-for-website-2.png"></a>
	<p>© 2017 | Jereme Davis</p>
</footer>



</body>
</html>