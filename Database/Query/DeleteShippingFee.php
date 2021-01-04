<?php
include('../Connection/Connect.php');
if(isset($_POST['DeleteShipping']))
{   
     // get id to delete
    $id = $_POST['id'];
    $sql = "DELETE FROM shipping WHERE id = :idbase";
    $query_delete = $conn->prepare($sql);
    $result = $query_delete->execute(array(":id"=>$id));
    
    if($result)
    {
        header("Location: ../Admin/Admin-AddShippingFee.php");   
    }
    else{
        echo 'ERROR Data Not Deleted';
    }

}
?>