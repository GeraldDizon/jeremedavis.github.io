<?php
session_start();
require('../Database/Query/ViewShippingLocation.php');
require('../Database/Query/AddShippingFee.php');
require('../Database/Query/DeleteShippingFee.php');
require('../Database/Query/EditShippingFee.php');
require('../Connection/AdminOnlyPageRedirect.php');

/*if (!isset($_SESSION['views'])) {
  $_SESSION['views'] = 0;
} else {
  $_SESSION['views']++;
}
 echo $_SESSION['views'];*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../Css/Admin-ShippingFee.css">
  <script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery-1.12.2.min.js"></script>
  <script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/npm.js"></script>
  <script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../Admin/Admin-Registered-Accounts.php">Users</a></li>
        <li><a href="../Admin/Admin-Inquiry.php">Inquiry</a></li>
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tables
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a href = "../Admin/Admin-AddProduct.php">Collection</a></li>
                  <li role="presentation"><a href = "../Admin/Admin-AddCategory.php">Category</a></li>
                  <li role="presentation"><a href = "../Admin/Admin-AddShippingFee.php">Shipping</a></li>
                  <li role="presentation"><a href = "../Admin/Admin-AddFeaturedItem.php">Featured</a></li>
                  <li role="presentation"><a href = "../Admin/Admin-AddCarousel.php">Carousel</a></li>
                </ul>
            </li>
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../Admin/Admin-Orders.php">Pending Orders</a></li>
                  <li><a href="../Admin/Admin-Order-History.php">Orders Completed</a></li>
                </ul>
            </li>
          <li role="presentation"><a href = "../Public/Logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" id = "bottomHalf">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="../Admin/Admin-Registered-Accounts.php">Users</a></li>
        <li><a href="../Admin/Admin-Inquiry.php">Inquiry</a></li>
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tables
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a href = "../Admin/Admin-AddProduct.php">Collection</a></li>
                  <li role="presentation"><a href = "../Admin/Admin-AddCategory.php">Category</a></li>
                  <li role="presentation"><a href = "../Admin/Admin-AddShippingFee.php">Shipping</a></li>
                  <li role="presentation"><a href = "../Admin/Admin-AddFeaturedItem.php">Featured</a></li>
                  <li role="presentation"><a href = "../Admin/Admin-AddCarousel.php">Carousel</a></li>
                </ul>
            </li>
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Order
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../Admin/Admin-Orders.php">Pending Orders</a></li>
                  <li><a href="../Admin/Admin-Order-History.php">Orders Completed</a></li>
                </ul>
            </li>
          <li role="presentation"><a href = "../Public/Logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-10">
      <div class = "container-fluid">
      <div class="row">
                      <h4><img class = "Sub-Image" src = "../Images/Admin-Shipping.png"> Add Shipping Details</h4>
          <hr>
      	<form method = "POST">
	        <div class = "form-group input-group-sm">
	          <input type="text" class="form-control input-sm" name="ShippingAddress" placeholder="Shipping Address">
          </div>
          <div class = "form-group input-group-sm">
            <input type="text" class="form-control input-sm" name="ShippingFee" placeholder="Shipping Fee">
          </div>
	          <input type="submit" value = "Submit" name = "AddShippingFee" class = "btn_add_shipping">
    
	    </form>

		<table class="table table-bordered text-center">
	        <thead>
	        <tr>
	          <th>Shipping Address</th>
	          <th>Shipping Fee</th>
            <th></th>
	        </tr>
	        </thead>
	        <tbody>
	          <?php foreach($ShippingLocation as $row){?>	
            <tr>
	          <form method = "POST">
	          	  <input type = "hidden" value = "<?php echo $row['id'] ?>" name = "idbase">
                <div class = "form-group input-group-sm">
                  <td><input type="text" class="form-control input-sm" name="Address" value = "<?php echo $row['ShippingAddress'] ?>"></td>
                </div>
                <div class = "form-group input-group-sm">
                  <td><input type="text" class="form-control input-sm" name="Fee" value = "<?php echo $row['ShippingFee'] ?>"></td>
                </div>
                <td>
                  <button type="submit" name="EditShipping"  align = "right"><img src="../Images/Update.png" alt = "Update" class = "EmailSent" ></button>
                  <button type="submit" name="DeleteShipping"  align = "right"><img src="../Images/Trash-Icon.png" alt="Delete" class = "EmailSent" ></button>
                </td>

	          </form>
            </tr>
	          <?php } ?>
	        </tbody>
	    </table>
      </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

