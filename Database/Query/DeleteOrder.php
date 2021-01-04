<?php
require("../Connection/Connect.php");

// php delete data in mysql database using PDO
    try {
        $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
if(isset($_POST['DeleteOrder']))
{   
     // get id to delete
    $id = $_POST['idbase'];
    $sql = "DELETE FROM cart WHERE id = :id";
    $query_delete = $conn->prepare($sql);
    $result = $query_delete->execute(array(":id"=>$id));
    
    if($result)
    {
        echo 'Data Deleted';
        header("Location: ../Public/Cart.php");
    }
    else{
        echo 'ERROR Data Not Deleted';
    }

}
?>