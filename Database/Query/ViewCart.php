<?php
require('../Connection/Connect.php');

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Error" . $e->getMessage();
}

    // Create connection
    // Check connection
    $BuyersId = $_SESSION['idbase'];
    $sql = "SELECT id, ProductName, Quantity, Price, Subtotal, BuyerId FROM cart WHERE BuyerId =:BuyerId";
    $query = $conn->prepare($sql);
    $executed = $query->execute(array(":BuyerId"=>$BuyersId));
    $rows = array();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        $rows[] = $row;
    }

?>