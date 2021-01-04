<?php
    include('../Connection/Connect.php');

    // Create connection
    // Check connection
    $shippingid = (int)$_GET['id'];
    $sql = "SELECT * FROM orderhistory WHERE OrderID =:OrderID";
    $query = $conn->prepare($sql);
    $executed = $query->execute(array(":OrderID"=>$shippingid));
    $Orders = array();
   	while ($rowOrders = $query->fetch(PDO::FETCH_ASSOC)){
	    $Orders[] = $rowOrders;
    }


?>