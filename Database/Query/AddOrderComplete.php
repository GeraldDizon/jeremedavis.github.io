<?php
require("../Connection/Connect.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
if(isset($_POST['completed'])){


    //Get data from input type boxes
    $id = $_POST['id']; 
    $status = "Completed";
    $sql = "UPDATE shippingdetails SET Status = '$status' WHERE id = :id";
    $query = $conn->prepare($sql);
    $result = $query->execute(array(":id"=>$id));
    header("Location: ../Admin/Admin-Orders.php");
    // prepare sql and bind parameters
if($stmt)
    {


    }else{
        echo 'Error';
    }

}


?>