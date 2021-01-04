<?php
require("../Connection/Connect.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
if(isset($_POST['AddCart'])){

    //Get data from input type boxes
    $ProductName = $_POST['Name'];
    $Quantity = $_POST['Quantity'];
    $Price = $_POST['Price'];
    $Subtotal = $_POST['Subtotal'];
    $BuyerId = $_POST['BuyerId'];

    // prepare sql and bind parameters
    $sql = "INSERT INTO cart(ProductName, Quantity, Price, Subtotal, BuyerId) VALUES (?, ?, ?, ?, ?)";
    $query = $conn->prepare($sql);
    $stmt = $query->execute(array($ProductName,$Quantity,$Price, $Subtotal, $BuyerId));

if($stmt)
    {
        header("Location: Cart.php");
    }else{
        echo 'Data Not Inserted';
    }

}


?>