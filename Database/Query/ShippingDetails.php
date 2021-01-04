<?php
if(isset($_POST['AddShippingDetails'])){

				    $_SESSION['name'] = $_POST['name'];
				    $_SESSION['email'] = $_POST['email'];
				    $_SESSION['contact'] = $_POST['contact'];
				    $_SESSION['address'] = $_POST['address'];
				    $_SESSION['shippingfee'] = $_POST['ShippingFee'];
				    header("Location: Payment.php");

}
/*$rows = array();
if(isset($_POST['AddShippingDetails'])){
    $rows[] = $_POST;
    $_SESSION['values'] = $rows;
    print_r($_SESSION['values']);
    header("Location: Success.php");
}*/
?>

