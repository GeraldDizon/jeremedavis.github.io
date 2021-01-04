<?php
    include('../Connection/Connect.php');

    // Create connection
    // Check connection
    $sql = "SELECT * FROM shippingdetails where Status = 'Processing' OR Status = 'Shipping' OR  Status = 'Pickup' ORDER BY id DESC";
    $query = $conn->prepare($sql);
    $executed = $query->execute();

?>