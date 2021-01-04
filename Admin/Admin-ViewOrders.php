<?php
	session_start();
	/*require_once('../Connection/Redirect.php');
	if (!isset($_SESSION['views'])) {
	  $_SESSION['views'] = 0;
	} else {
	  $_SESSION['views']++;
	}
	 echo $_SESSION['views'];*/
	include("../Database/Query/ViewOrderHistory.php");
	include("../Database/Query/ViewOrderShippingDetails.php");
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../Css/nav.css">
	<link rel="stylesheet" type="text/css" href="../Css/Order.css">
	<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap-min.js"></script>
	<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery-1.12.2.min.js"></script>
	<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	</head>
	<body onload="total();">

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
						                    <li><a href="Admin-Orders.php">Go Back</a></li>


						              </div>
				  	</nav>
				  	
<div class = "container-fluid title-background  text-center">						    	
	<p class = "main-title">Jereme Davis</p>
</div>


<div class = bg-order>
	<div class = "container">
		<div class = "row">
			<table class="table text-center">
		        <thead>
		        <tr>
		          <th>Product Name</th>
		          <th>Price</th>
		          <th>Quantity</th>
		          <th>Subtotal</th>
		        </tr>
		        </thead>
		        <tbody>
	          		<?php foreach($Orders as $row){?>	
			            <tr>
			            	<td><?php echo  $row['ProductName'] ?></td>
							<td><?php echo "&#8369; " .  $row['Price'] ?></td>
							<td><?php echo $row['Quantity'] ?></td>
							<td><?php echo "&#8369; " .  $row['Subtotal'] ?></td>
							<?php $subtotal[] = $row['Subtotal'];
			           	 ?>
			            </tr>
			        <?php } ?>

		        </tbody>
		    </table>
		    <table class="table text-center">
		        <tbody>
	          		<?php foreach($ShipDetails as $row){?>	         		
			            <tr>
			            	<td>Subtotal</td>
			            	<?php $total = array_sum($subtotal); ?>
			            	<td id = "subtotal"><?php echo "&#8369; " . number_format($total) ?></td>
			            </tr>
			            <tr>
			            	<td>Fee</td>
			            	<td id = "shippingfee"><?php echo $row['ShippingFee'] ?></td>
			            </tr>
			            <tr>
			            	<td class = "order-total">Total</td>
			            	<td class = "order-total" id = "total"></td>
			            </tr>

			        <?php } ?>
		        </tbody>
		    </table>


		    <h3>Shipping Details</h3>
			    <?php foreach($ShipDetails as $row){?>	
			    	<?php echo $row['Name']; ?><br>
			    	<?php echo $row['Address']; ?><br>
			    	<?php echo $row['Contact']; ?><br>
			    <?php } ?>
		</div>
	</div>
</div>

<footer class = "text-center fixed-bottom">
	<a href="Home.php"><img  src="../Images/Logo-for-website-2.png"></a>
	<p>© 2017 | Jereme Davis</p>
</footer>

<script rel="stylesheet" type="text/javascript" src="../Javascript/Order.js"></script>

</body>
</html>