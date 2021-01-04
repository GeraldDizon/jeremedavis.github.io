<?php
    include('../Connection/Connect.php');

    // Create connection
    // Check connection
    $BuyersId = $_SESSION['idbase'];
    $sql = "SELECT * FROM shippingdetails WHERE UserID =:UserID";
    $query = $conn->prepare($sql);
    $executed = $query->execute(array(":UserID"=>$BuyersId));

?>

