<?php
require("../Connection/Connect.php");

// php delete data in mysql database using PDO
if(isset($_POST['EditShipping']))
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     // get id to delete


    $id = $_POST['idbase'];
    $ShippingAddress = $_POST['Address'];
    $ShippingFee = $_POST['Fee'];




$sql = "UPDATE shipping SET ShippingAddress = :Address, ShippingFee = :Fee WHERE id = :idbase";
$query = $conn->prepare($sql);
$result = $query->execute(array(":Address"=>$ShippingAddress, ":Fee"=>$ShippingFee, ":idbase"=>$id));

if($result){
    header("Location: ../Admin/Admin-AddShippingFee.php");
} else {
    echo 'error';
}

}
?>


