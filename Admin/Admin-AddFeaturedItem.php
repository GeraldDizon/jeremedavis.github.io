<?php 
session_start();
require('../Database/Query/ViewProduct.php');
require('../Database/Query/AddFeatured.php');
require('../Connection/AdminOnlyPageRedirect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/Admin-AddProduct.css">
<link rel="stylesheet" type="text/css" href="../Css/nav.css">
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery-1.12.2.min.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/npm.js"></script>
<script rel="stylesheet" type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script rel="stylesheet" type="text/javascript" src="../Javascript/ViewRecord.js"></script>

<script src = "../Javascript/ViewRecord.js"></script>
<script src = "../Javascript/Home.js"></script>
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
        <div class="container-fluid">
          <div class = "row">
          <h4><img class = "Sub-Image" src = "../Images/Admin-Items.png"> Add Featured Items</h4>
          <hr>


                <div style="overflow-x:auto;">
                  <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                          <th>Image</th>
                          <th>Product Name</th>
                          <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rows as $row){?>
                        <tr> 
                        <form method = "post" enctype="multipart/form-data">
                          <input type ="hidden" name = "id" value= "<?php echo $row['id'] ?>">
                          <input type ="hidden" name = "ImageFile" value= "<?php echo $row['Image'] ?>">
                          <td><img class = "ProductImage" src = "../Images/<?php echo $row['Image'] ?>"></td>
                          <td><p><?php echo $row['Name'] ?></p></td>
                          <td>

                            <div class="checkbox">
                            <?php if($row['Featured'] == "1"){ ?>
                              <label><input type="checkbox" name = "test" checked>Remove to featured</label>
                            <?php } else {?>
                              <label><input type="checkbox" name = "test">Add to featured</label>
                            <?php } ?>

                              <button type="submit" class = "DeleteButton" name="AddFeatured"  align = "right"><img src="../Images/Update.png" alt="Delete" class = "EmailSent" ></button>
 
                            </div>
                          </td>
                        </form>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                  <?php 
                    if($rowCount >= 5){
                      $items = $rowCount/5;
                      $items = ceil($items);
                      for($x = 1; $x <= $items; $x++){?>
                        <a href = "Admin-AddFeaturedItem.php?page=<?php echo $x; ?>"><?php echo $x. " "; ?></a>
                    <?php }
                    } 
                  ?>

                </div>
              </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
