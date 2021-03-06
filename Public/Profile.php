<?php
session_start();
include('../Connection/Redirect.php');
include("../Database/Query/ViewShippingDetails.php");
require('../Connection/Verification.php');
/*if (!isset($_SESSION['views'])) {
  $_SESSION['views'] = 0;
} else {
  $_SESSION['views']++;
}
 echo $_SESSION['views'];*/

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../Css/nav.css">
<link rel="stylesheet" type="text/css" href="../Css/Profile.css">
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap-min.js"></script>
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


	<div class = "bg-order-history">
		<div class = "container" id = "container">
			<div class = "row">
				<div class = "bg-user-details">
					<p class = "username"><?php echo $_SESSION['firstname']; echo " " .  $_SESSION['lastname']; ?></p>
					<p class = "emailadd"><?php echo $_SESSION['contact']; ?></p>
					<p class = "emailadd"><?php echo $_SESSION['Email']; ?></p>
					<p class = "emailadd"><?php echo $_SESSION['address']; ?></p>
				</div>
				<div class = "page-title">
					<h3>Order History  <span class ="sub-title">View Orders History</span></h3>
					<hr>
					<p class = "sub-title">History</p>
					<br>
				</div>
				<div class = "scrollable">  
					<table class="table table-bordered text-center">
						<thead>
							<tr>
								<th>Date of Payment</th>
								<th>Order ID</th>
								<th>Order Status</th>
								<th>View Order</th>
							</tr>
					    </thead>
						<tbody>
							<?php
							while ($row = $query->fetch(PDO::FETCH_ASSOC)){?>
							<tr>
							    <td><?php echo $row['DateofPayment'] ?></td>
							    <td><?php echo $row['id'] ?></td>
							    <td><?php echo $row['Status'] ?></td>
							   	<td><a href="Order.php?id=<?php echo $row['id']; ?>">View Order</a></td>
							</tr>
							<?php
							}?>
						</tbody>
					</table>
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