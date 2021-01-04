<?php
    include('../Connection/Connect.php');

    // Create connection
    // Check connection
    $OrderId = $_GET['id'];
    $sql = "SELECT * FROM shippingdetails WHERE id = :id";
    $query = $conn->prepare($sql);
    $executed = $query->execute(array(":id"=>$OrderId));
    $ShipDetails = array();
	while ($row = $query->fetch(PDO::FETCH_ASSOC)){
	    $ShipDetails[] = $row;
    }

?>

