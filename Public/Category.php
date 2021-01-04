<?php
session_start();
include("../Database/Query/ViewProductCategory.php");
include("../Database/Query/ViewCategory.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../Css/nav.css">
<link rel="stylesheet" type="text/css" href="../Css/Collection.css">
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


<div class = "container-fluid page-title-bg">						    	
	<p class = "page-title text-center">COLLECTION</p>
	<p class = "page-directory text-center">Collection   →   Double Deck Bed</p>
</div>














<div class = "bg-collections">
	<div class ="container">
		<div class ="row">
			<div class = "col-sm-3">
				<div class ="category">
					
					<ul class = "category-list">
						<li>Product Categories</li>
						<?php foreach($categories as $row_categories){?>		
						<li ><a href ="Category.php?ProductCategories=<?php echo $row_categories['ProductCategories'];?>"><?php echo $row_categories['ProductCategories'] ?></a></li>
						<?php } ?>
					</ul>

				</div>		
			</div>
			<div class = "col-sm-9 ">

				<div class='row'>
				<?php
				$i = 0;
				foreach($ProductCategories as $row_product){?>
					<div class='col-sm-4'>
						<div class='thumbnail'>
						<img class = "ProductImage" src = "../Images/<?php echo $row_product['Image'] ?>">
						<hr>
						<input type ="hidden" name = "id" value ="<?php echo $row_product['id'] ?>">
						<p class = "name text-center"><?php echo $row_product['Name'] ?></p>
						<div class = "container-fluid">
						        <div class = "text-center price col-md-6">
						        	₱ <?php echo $row_product['Price'] ?></p>
						        </div>
						        <div class = "text-center info col-md-6">
						        	<?php if(isset($_SESSION['Email'])){ ?>
									<a href ="ProductInfo.php?id=<?php echo $row_product['id'];?>">More Info</a></td>
									<?php } 
									else{ ?>
										<a href ="../Public/Account.php">Add to Cart</a></td>
									<?php }?>
						        </div>
					        </div>
				      <?php echo '</div>';
				  echo '</div>';
				  $i++;
				  if ($i % 3 == 0) {echo '</div><div class="row">';}
				}
				?>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<footer class = "text-center">
	<a href="Home.php"><img  src="../Images/Logo-for-website-2.png"></a>
	<p>© 2017 | Jereme Davis</p>
</footer>



</body>
</html>

