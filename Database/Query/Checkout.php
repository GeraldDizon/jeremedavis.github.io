<?php
session_start();
include("../../Database/Query/ViewCartCheckout.php");
require("../../Connection/Connect.php");

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Error" . $e->getMessage();
}

    
    
    date_default_timezone_set ('Asia/Manila');
    $current_date = date('Y-m-d');
    $DateofPayment = $current_date;

    $name = $_POST['name'] = $_SESSION['name'];
    $email = $_POST['email'] = $_SESSION['email'];
    $contact = $_POST['contact'] = $_SESSION['contact'];
    $address = $_POST['address'] = $_SESSION['address'];
    $userid = $_POST['userid'] = $_SESSION['idbase'];
    $shippingfee = $_SESSION['shippingfee'];

    $Status = "Processing";
    //Get data from input type boxes

    // prepare sql and bind parameters
    $sql = "INSERT INTO shippingdetails(Name, Email, Contact, Address, DateofPayment, Status, ShippingFee, UserID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $query = $conn->prepare($sql);
    $stmt = $query->execute(array($name, $email, $contact, $address, $DateofPayment, $Status, $shippingfee, $userid));
    $orderid= $conn->lastInsertId();





    // prepare sql and bind parameters
    $sql = "INSERT INTO orderhistory(ProductName, Quantity, Price, Subtotal, OrderID) VALUES (:ProductName, :Quantity, :Price, :Subtotal, :OrderID)";
    $query = $conn->prepare($sql);
    foreach($rows as $row)
    {
    $stmt = $query->execute([
        ':ProductName' => $row['ProductName'],
        ':Quantity' => $row['Quantity'],
        ':Price' => $row['Price'],
        ':Subtotal' => $row['Subtotal'],
        ':OrderID' => $orderid
        ]);
    }

    if($stmt){
        echo 'Data Inserted';
        $BuyersId = $_SESSION['idbase'];
        $sql = "DELETE FROM cart WHERE BuyerId =:BuyerId";
        $query = $conn->prepare($sql);
        $result = $query->execute(array(":BuyerId"=>$BuyersId));
        
        if($result)
        {
            echo 'Data Deleted';
            header("Location: ../../Public/Success.php?id=$orderid");
        }
        else{
            echo 'ERROR Data Not Deleted';
        }

        }else{
            echo 'Data Not Inserted';
        }





?>