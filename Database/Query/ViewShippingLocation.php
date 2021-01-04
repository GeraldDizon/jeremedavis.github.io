<?php
    include('../Connection/Connect.php');

    // Create connection
    // Check connection

    $sql = "SELECT * FROM shipping  ORDER BY ShippingAddress ASC";
    $query = $conn->prepare($sql);
    $executed = $query->execute();
    if($executed){
    	 $ShippingLocation = array();
  while ($ShipRow = $query->fetch(PDO::FETCH_ASSOC)){
        $ShippingLocation[] = $ShipRow;
      }
    }

?>

