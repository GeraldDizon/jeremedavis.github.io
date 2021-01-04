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
	include("../Database/Query/DeleteOrder.php");
	require('../Connection/Verification.php');
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../Css/nav.css">
	<link rel="stylesheet" type="text/css" href="../Css/Cart.css">
	<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap-min.js"></script>
	<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery-1.12.2.min.js"></script>
	<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	</head>
	<body onload="CaclulateQuantityTotal();">

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

			<?php 
				$rowCheck = $query->rowCount();
					  if(!$rowCheck){ ?>
					  	<div class = "text-center">
					  		<div class = "container ">
					  			<div class = "cart-bg">
					  				<img src = "../Images/Cart.png" class = "cart-img">
					  				<p class = "cart-info-subtitle">Your cart is <br> <span>Empty</span></p>
					  			</div>
					  		</div>
					    </div>
					<?php } else{ ?>
							<div class = "col-md-9">
								<table>
									<tr>
										<th>Product</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Subtotal</th>
										<th></th>
									</tr>
									<?php foreach($rows as $row){?>
											<tr class="items" id="items">
												<form method = "POST">
													<input type = "hidden" name = "idbase" value ="<?php echo $row['id'] ?>">
													<input type = "hidden" name = "name" value ="<?php echo $row['ProductName'] ?>">
														<td><?php echo $row['ProductName'] ?></td>
														<input type="hidden" name="cost" id="cost" value = "<?php echo $row['Price'] ?>"/>
														<td><?php echo number_format($row['Price']) ?></td>
														
														<input type = "hidden" id="quantity" value = "<?php echo $row['Quantity'] ?>">

														<td><p class = "quantity" onblur="CaclulateQuantityTotal();" data-id1 = "<?php echo $row['id'] ?>" contenteditable><?php echo $row['Quantity'] ?></p></td>

														
														<td class = "subtotal" id = "total" data-id2 = "<?php echo $row['id'] ?>"></td>
														<input type = "hidden"  name = "subtotal"></td>
														<td>
														<button type="submit" class = "DeleteButton" name = "DeleteOrder"  align = "right"><img src="../Images/Trash-Icon.png" alt="Delete" class = "EmailSent" ></button>
														</td>
												</form>
											</tr>
										<?php } ?>			
								</table>
							</div>

			



			<div class = "col-md-3">
				<div class = "bg-checkout">
					<?php foreach($rows as $row){?>		
					<?php $subtotal[] = $row['Subtotal'];
					}?>
					<?php if(!empty($subtotal)){
						$total = array_sum($subtotal); ?>
					<p class = "order-total">Order Total</p>
					<hr>
					<p class = "order-info">Subtotal: <?php echo number_format($total)?></p>

					<?php if($_SESSION['status'] == 'Pending'){ ?>
						<a onclick = "notifVerif();">Continue</a>
					<?php } else {?>
					<div class = "container-fluid">
						<div class = "row">
							<div class = "continue col-sm-6 col-md-12 text-center">
								<a href = "Review.php" >Continue</a>
							</div>
						</div>

						<div class = "row">
							<div class = "continueshopping col-sm-6 col-md-12 text-center">
								<a href = "Collection.php">Continue Shopping</a>
							</div>
							<div class = "col-md-7">
							</div>
						</div>
					</div>
					<?php } ?>


					<?php } else {	
						$total = 0; ?>
					<p class = "order-total">Order Total</p>
						<hr>
						<p class = "order-info">Subtotal: <?php echo $total ?></p>
						<p class = "order-info">Shipping Fee</p>
						<p class = "order-info">Total Amount</p>

					<?php }
					?>
					
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>

<footer class = "text-center fixed-bottom">
	<a href="Home.php"><img  src="../Images/Logo-for-website-2.png"></a>
	<p>© 2017 | Jereme Davis</p>
</footer>

<script rel="stylesheet" type="text/javascript" src="../Javascript/Cart.js"></script>

<script>
	
function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"../Database/Query/EditOrder.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                   location.href = "Cart.php";
                }  
           });  
      }
      $(document).on('blur', '.quantity', function(){  
           var id = $(this).data("id1");    
           var quantity_value = $(this).text(); 
           edit_data(id, quantity_value, "Quantity"); 
      });

      $(document).on('click', '.subtotal', function(){  
           var id = $(this).data("id2");  
           var subtotal_value = $(this).text();   
           edit_data(id, subtotal_value, "Subtotal");  
      });


</script>


</body>
</html>