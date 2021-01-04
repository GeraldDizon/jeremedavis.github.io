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
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../Css/nav.css">
<link rel="stylesheet" type="text/css" href="../Css/Payment.css">
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap-min.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery-1.12.2.min.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/npm.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script rel="stylesheet" type="text/javascript" src="../Javscript/CartSum.js"></script>
</head>

<body onload = "total()">

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


<div class = bg-cart>
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
		<div class = "row">
			<div class = "col-md-9">
				<table>
					<tr>
					    <th>Product</th>
					    <th>Price</th>
					    <th>Quantity</th>
					    <th>Subtotal</th>
					</tr>
					<tr>
					    <?php foreach($rows as $row){?>
							<tr>
								<form method="post">
									<input type = "hidden" name = "idbase" value ="<?php echo $row['id'] ?>">
										<td><p><?php echo $row['ProductName'] ?></p></td>
										<td><p><?php echo number_format($row['Price']) ?></p></td>
										<td><p><?php echo $row['Quantity'] ?></p></td>
										<td><p><?php echo number_format($row['Subtotal']) ?></p></td>
								</form>
							</tr>
						<?php } ?>
					</tr>
				</table>
				<div class = "col-md-12 bg-shipping-details">
					<h3>Shipping Details</h3>
					<hr>
					<div class = "col-md-6">
						<p><span>Name:</span> <?php echo $_SESSION['name']?></p>
						<p><span>Email:</span> <?php echo $_SESSION['email']?></p>
						<p><span>Contact:</span> <?php echo $_SESSION['contact']?></p>
					</div>
					<div class = "col-md-6">
						<p><span>Address:</span> <?php echo $_SESSION['address']?></p>
					</div>
				</div>

			</div>
			<div class = "col-md-3">
				<div class = "bg-checkout">
					<form method="post" name="cart" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="upload" value="1">
						<input type="hidden" name="business" value="jereme@yahoo.com">
						<input type="hidden" name="lc" value="PH">
						<input type="hidden" name="currency_code" value="PHP">
						<input type="hidden" name="return" value="http://localhost/EdgarDavis/Database/Query/Checkout.php" />

						<?php $cnt = 2; ?>
						<?php foreach($rows as $row){?>
						<tr>
						<input type="hidden" name="ProductName" value="<?php echo $row['ProductName'] ?>">
						<input type="hidden" name="Price" value="<?php echo $row['Price'] ?>">
						<input type="hidden" name="Quantity" value="<?php echo $row['Quantity'] ?>">
						<!--Get the value of the Product Name, Price and Quantity before checkout passing date to Orderhistory-->
						<input type ="hidden" name = "BuyerId" value = "<?php echo $row['BuyerId'] ?>">
						<input type = "hidden" name="item_name_<?php echo $cnt ?>" value="<?php echo $row['ProductName']; ?>"/>
						<input type = "hidden" name="amount_<?php echo $cnt ?>" value="<?php echo $row['Subtotal']; ?>"/>
						<?php $cnt++; ?>
						</tr>

						<?php foreach($rows as $row){?>		
						<?php $Subtotal[] = $row['Subtotal'];
						}?>
						<?php if(!empty($Subtotal)){
							$total = array_sum($Subtotal); 
						} else {
							$total = 0;
						}
					}
						?>
						<p class = "order-total">Order Total</p>
						<hr>
						<p class = "order-info" id = "subtotal">Subtotal: <?php echo number_format($total) ?></p>
						<p class = "order-info" id  = "shippingfee">Shipping Fee: <?php echo $_SESSION['shippingfee'] ?></p>
						<input type = "hidden" value = "<?php echo $_SESSION['shippingfee'] ?>" id ="shippingValue">
						<p class = "order-info" id = "total"></p>
						<input type = "hidden" name="item_name_1" value="Shipping Fee"/>
						<input type = "hidden" name="amount_1"  id = "shippingPaypal" value = "<?php echo $_SESSION['shippingfee'] ?>">
						<div class = "container-fluid">
						<div class = "row">
							<div class = "continue col-sm-6 col-md-12 text-center">
								<input type = "submit" value ="Checkout">
							</div>
						</div>
						<div class = "row">
							<div class = "continueshopping col-sm-6 col-md-12 text-center">
								<a href = "Collection.php">Continue Shopping</a>
							</div>
							<div class = "col-md-6">
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script rel="stylesheet" type="text/javascript" src="../Javascript/Payment.js"></script>
<footer class = "text-center">
	<a href="Home.php"><img  src="../Images/Logo-for-website-2.png"></a>
	<p>© 2017 | Jereme Davis</p>
</footer>



</body>
</html>