<?php
session_start();
include("../Database/Query/ViewProductInfo.php");
include("../Database/Query/AddCart.php");
require('../Connection/Verification.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../Css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="../Css/ProductInfo.css">
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



<div class = "container bg-product-info">
	<div class = "row">
		<?php while ($row = $query_view->fetch(PDO::FETCH_ASSOC)){ ?>
				<form method="POST">
					<div class ="col-md-8">
						<div class="sketchfab-embed-wrapper"><iframe width="620" height="480" src="<?php echo $row['3dLink'] ?>" frameborder="0" allowvr allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
						</div>
					</div>
					<div class ="col-md-4">
						<div class = "">
							<input type = "hidden" name = "BuyerId" value = "<?php echo $_SESSION['idbase'] ?>">
							<input type = "hidden" name ="Name" value = "<?php echo $row['Name'] ?>">
							<input type = "hidden" name ="Price" value = "<?php echo $row['Price'] ?>">
							<input type = "hidden" name ="Quantity" value = "1">
							<input type = "hidden" name ="Subtotal" value = "<?php echo $row['Price'] ?>">

							<p class = "text-name"><?php echo $row['Name'] ?></p>
							<br>
							<p class = "text-price"><?php echo "&#8369; " . number_format($row['Price']) ?></p>
							<br>
							<ul>
								<h4>Description</h4>
								<li><?php echo $row['Description'] ?></li>
								<br>
								<h4>Furniture Size</h4>
								<li><?php echo $row['Size'] ?></li>
								<br>
								<h4>Type of wood</h4>
								<li><?php echo $row['Wood'] ?></li>
							</ul>
							<br>
							<?php if($_SESSION){ ?>
								<input type = "submit" name ="AddCart" value = "Add to cart" class = "btn_add_product">
							<?php } else { ?>
								<a href = "Account.php"  class = "btn_add_product">Add to cart</a>
							<?php } ?>
						</div>
					</div>
				</form>
		<?php } ?>
	</div>
</div>





<footer class = "text-center">
	<a href="Home.php"><img  src="../Images/Logo-for-website-2.png"></a>
	<p class ="footerText">© 2017 | Jereme Davis</p>
</footer>

<script rel="stylesheet" type="text/javascript" src="../Javascript/ProductInfo.js"></script>


	</body>
</html>

