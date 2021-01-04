<?php
session_start();
require_once('../Connection/Redirect.php');
include('../Database/Query/ViewAdminOrderHistory.php');
include('../phpmailer/PickupEmail.php');
include('../phpmailer/DeliveryEmail.php');
include('../Database/Query/AddOrderComplete.php');
require('../Connection/AdminOnlyPageRedirect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/admin-inquiry.css">
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
                  <li role="presentation"><a href = "../Admin/Admin-AddCategory.php">Categories</a></li>
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
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-10">
                    <h4><img class = "Sub-Image" src = "../Images/Admin-OrdersPending.png"> Orders Pending</h4>
          <hr>
      <table class="table table-bordered text-center">
        <thead>
        <tr>
          <th>Date of Payment</th>
          <th>Order ID</th>
          <th>Order Status</th>
          <th>Name</th>
          <th>Address</th>
          <th>Email</th>
          <th>Shipping Fee</th>
          <th>View Order</th>
        </tr>
        </thead>
        <tbody>
          <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)){?>
          <tr>
            <form method = "POST">
              <td><?php echo $row['DateofPayment'] ?></td>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['Status'] ?></td>
              <td><?php echo $row['Name'] ?></td>
              <td><?php echo $row['Address'] ?></td>
              <td><?php echo $row['Email'] ?></td>
              <td><?php echo $row['ShippingFee'] ?></td>

              <input type ="hidden" name = "id" value= "<?php echo $row['id'] ?>">
              <input type = "hidden" name = "Name" value ="<?php echo $row['Name'] ?>">
              <input type = "hidden" name = "Email" value ="<?php echo $row['Email'] ?>">
              <input type = "hidden" name = "Contact" value ="<?php echo $row['Contact'] ?>">
              <input type = "hidden" name = "Address" value ="<?php echo $row['Address'] ?>">
              <input type = "hidden" name = "DateofPayment" value ="<?php echo $row['DateofPayment'] ?>">
              <input type = "hidden" name = "Status" value ="<?php echo $row['Status'] ?>">
              <input type = "hidden" name = "UserID" value ="<?php echo $row['UserID'] ?>">


              <td>
                <a href="Admin-ViewOrders.php?id=<?php echo $row['id'] ?>">View Order</a>

                <?php if($row['Status'] == "Processing" && $row['ShippingFee'] == "0"){ ?>

                  <input type = "submit" name = "pickup" value = "Ready for Pickup">

                <?php } else if($row['Status'] == "Processing" && $row['ShippingFee'] != "0"){?>

                  <input type = "submit" name = "delivery" value = "Ready for Shipping">

                <?php } else if($row['Status'] == "Shipping" || $row['Status'] == "Pickup" ){?>

                  <input type = "submit" name = "completed" value = "Complete">

                <?php } ?>
              </td>
            </form>
          </tr>
          <?php } ?>
        </tbody>
    </div>
  </div>
</div>

</body>
</html>
