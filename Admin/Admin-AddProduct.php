<?php 
session_start();
require('../Database/Query/AddProduct.php');
require('../Database/Query/AddShippingFee.php');
require('../Database/Query/DeleteProduct.php');
require('../Database/Query/EditProduct.php');
require('../Database/Query/ViewProduct.php');
require('../Database/Query/ViewCategory.php');
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
          <h4><img class = "Sub-Image" src = "../Images/Admin-Items.png"> Add Items</h4>
          <hr>


            <button type="button" class="btn_add_product" data-toggle="modal" data-target="#myModal">Add Product</button>
            <br>
            <br>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Product</h4>
                      </div>
                      <div class="modal-body">
                        <div class = "AddCabinet">
                          <form id = "uploader" method = "post" enctype="multipart/form-data">
                            <input type = "file" name = "fileUpload" id = "fileUpload" onchange = "showImage.call(this)">
                            <img style = "display: none" height = "200" id = "image">
                            <br>
                              <div class = "form-group input-group-sm">
                                <input type="text" class="form-control input-sm" name="Link" placeholder="3D Link">
                              </div>
                              <div class = "form-group input-group-sm">
                                <input type="text" class="form-control input-sm" name="Name" placeholder="Product Name">
                              </div>
                              <div class = "form-group input-group-sm">
                                <select class="form-control" name = "Type">
                                  <?php foreach($categories as $row_categories){?>
                                    <option><?php echo $row_categories['ProductCategories'] ?></option>
                                    <?php } ?>
                                </select>
                              </div>
                              <div class = "form-group input-group-sm">
                                <input type="text" class="form-control input-sm" name="Price" placeholder="Product Price">
                              </div>
                              <div class = "form-group input-group-sm">
                                <input type="text" class="form-control input-sm" name="Size" placeholder="Product Size">
                              </div>
                              <div class = "form-group input-group-sm">
                                <input type="text" class="form-control input-sm" name="Wood" placeholder="Product Wood">
                              </div>
                              <div class = "form-group input-group-sm">
                                  <textarea class= "input-control-textarea" id="txt" name="Description" rows="5" placeholder = " Product Description (500 Characters)" maxlength="500"></textarea>
                              </div>
                                            

                              <button type="submit" id="SubmitButton"  name = "AddProduct" class = "btn_add_item_modal">Submit</button>
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                    
                </div>
            </div>
              <?php 
                if(empty($errorsAddProduct) === false){
                  foreach ($errorsAddProduct as $errors){
                    echo '<ul>';  
                    echo '<li>',$errors,'</li>';
                    echo '</ul>';
                  }
                }
              ?>
                <div style="overflow-x:auto;">
                  <table class="table-responsive table-bordered text-center">
                    <thead>
                    <tr>
                          <th>Image</th>
                          <th>3d Link</th>
                          <th>Product Name</th>
                          <th>Type</th>
                          <th>Price</th>
                          <th>Description</th>
                          <th>Size</th>
                          <th>Type of Wood</th>
                          <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rows as $row){?>
                        <tr> 
                        <form method = "post" enctype="multipart/form-data">
                          <input type ="hidden" name = "id" value= "<?php echo $row['id'] ?>">
                          <input type ="hidden" name = "ImageFile" value= "<?php echo $row['Image'] ?>">
                          <td><img class = "ProductImage" src = "../Images/<?php echo $row['Image'] ?>">
                            <input type = "file" name = "fileUpload" id = "fileUpload"></td>
                          <td><input class = "form-control" type ="text" name = "Link" value = "<?php echo $row['3dLink'] ?>"></td>
                          <td><input class = "form-control" type ="text" name = "Name" value = "<?php echo $row['Name'] ?>"></td>
                          <td>        
                          <div class = "form-group input-group-sm">
                        <select class="form-control" name = "Type">
                          <option  hidden><?php echo $row['Type'] ?></option>
                          <?php foreach($categories as $row_categories){?>
                            <option><?php echo $row_categories['ProductCategories'] ?></option>
                            <?php } ?>
                        </select>
                          </div>
                          </td>
                          <td><input class = "form-control" type ="text" name = "Price" value = "<?php echo $row['Price'] ?>"></td>
                          <td><input class = "form-control" type ="text" name = "Description" value = "<?php echo $row['Description'] ?>"></td>
                          <td><input class = "form-control" type ="text" name = "Size" value = "<?php echo $row['Size'] ?>"></td>
                          <td><input class = "form-control" type ="text" name = "Wood" value = "<?php echo $row['Wood'] ?>"></td>
                          <td>
                        <button type="submit" class = "DeleteButton" name="EditProduct"  align = "right"><img src="../Images/Update.png" alt="Delete" class = "EmailSent" ></button>
                        <button type="submit" class = "DeleteButton" name="DeleteProduct"  align = "right"><img src="../Images/Trash-Icon.png" alt="Delete" class = "EmailSent" ></button>
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
                        <a href = "Admin-AddProduct.php?page=<?php echo $x; ?>"><?php echo $x. " "; ?></a>
                    <?php }
                    } 
                  ?>

                </div>
              </div>
      </div>
    </div>
  </div>
</div>

<script>
  function showImage(){
    if(this.files && this.files[0]){
      var obj = new FileReader();
      obj.onload = function(data){
        var image = document.getElementById("image");
        image.src = data.target.result;
        image.style.display = "block";
      }
      obj.readAsDataURL(this.files[0]);
    }
  }

</script>

</body>
</html>
