<?php
session_start();
require('../Connection/Verification.php');
require("../Database/Query/ViewFeatured.php");
require("../Database/Query/ViewCarousel.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/Home.css">
<link rel="stylesheet" type="text/css" href="../Css/nav.css">
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery-1.12.2.min.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/npm.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</head>

<body id = "body">
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






<div class = "container-fluid  Main-Background" " >
	<div class = "row">
		<div class = "col-md-1">
		</div>
		<div class = "col-md-4 Description-Background">
			<h1 class = "text-center Product-Title">Furniture</h1>	
			<p class = "Description">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique sodales sem a tempor. Proin mollis, turpis eu semper pharetra, ipsum mauris laoreet odio, in semper neque nulla sit amet lectus. Sed justo nisi, imperdiet eu ex pellentesque, pretium suscipit velit. Morbi quis ante quis sapien scelerisque tempor. Donec id hendrerit libero. Quisque metus urna, finibus pulvinar varius nec, bibendum accumsan odio. Praesent sodales maximus turpis, vel faucibus velit eleifend at.</p>	
			<button class = "text-center shop-main"><a href = "Collection.php" class = "a-shop-main">Shop Now <span class="glyphicon glyphicon-triangle-right"></span> </a></button>	   
			<br>
		</div>
		<div class  = "col-md-7">

		<?php if($rowCount == 0){ ?>
			 <img src="../Images/BedHome.png" class = "first-Image" alt="Image Not Found">
		<?php } else { ?>
			<br>
			<div class="container-fluid">
			<div class = "row">
			 <div id="myCarousel" class="carousel slide" data-ride="carousel">

		    <div class="carousel-inner">	
		      <?php
				$i = 0;
				foreach ($rows_carousel as $row) {
				    if($i == 0){ ?>
				    	<div class="item active">
				        <img src="<?php echo $row['Image'] ?>" alt="Image Not Found">
				      </div>
				    <?php } else { ?>
				    	<div class="item">
				        <img src="<?php echo $row['Image'] ?>" alt="Image Not Found">
				      </div>
				    <?php }
				    $i++;
				}
				?>
		    </div>

		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
		  <br>
		  </div>
		</div>
		<?php } ?>

		</div>
	</div>
</div>

<div class = "bg-trio">
	<div class = "container text-center">
		<div class = "col-md-4">

			<img src ="../Images/first-trio.png" class = "trio">
		</div>
		<div class = "col-md-4">
			<img src ="../Images/second-trio.png" class = "trio">

		</div>
		<div class = "col-md-4">
			<img src ="../Images/third-trio.png" class = "trio">
		</div>
	</div>
</div>



<?php if($rowCount >= "1"){ ?>
<div class = "bg-featured" id ="container">
	<div class = "container">
		<div class = "row">
			<p class ="text-center featured-title">Featured Collection</p>
			<p class = "text-center featured-subtitle">This Are Some Of Most Popular Products</p>
			<?php } else { ?>
			<?php } ?>
				<?php
					$i = 0;
					foreach ($rows_featured as $row) {?>		
						<div class='col-sm-4'>
							<div class='thumbnail'>
							<a href = "ProductInfo.php?id=<?php echo $row['id'] ?>"><img src = "../Images/<?php echo $row['Image'] ?>"></a>
					      </div>
					  </div>
					  <?php $i++;
					  if ($i % 3 == 0) {echo '</div><div class="row">';}
					}
					?>
		</div>
	</div>
</div>






<footer class = "text-center">
	<a href="Home.php"><img  src="../Images/Logo-for-website-2.png"></a>
	<p class ="footerText">© 2017 | Jereme Davis</p>
</footer>



</body>
</html>
