<?php
require("../Connection/Connect.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
if(isset($_POST['AddShippingFee'])){

    //Get data from input type boxes
    $ShippingAddress = $_POST['ShippingAddress'];
    $ShippingFee = $_POST['ShippingFee'];

    // prepare sql and bind parameters
    $sql = "INSERT INTO shipping(ShippingAddress, ShippingFee) VALUES (?, ?)";
    $query = $conn->prepare($sql);
    $stmt = $query->execute(array($ShippingAddress,$ShippingFee));

if($stmt)
    {
        header("Location: ../Admin/Admin-AddShippingFee.php");
    }else{
        echo 'Data Not Inserted';
    }

}


?>