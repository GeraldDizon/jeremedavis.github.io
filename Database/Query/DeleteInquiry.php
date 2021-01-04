<?php
include('../Connection/Connect.php');
if(isset($_POST['DeleteInquiry']))
{   
     // get id to delete
    $id = $_POST['idbase'];
    $sql = "DELETE FROM inquiry WHERE id = :id";
    $query_delete = $conn->prepare($sql);
    $result = $query_delete->execute(array(":id"=>$id));
    
    if($result)
    {
        header("Location: ../Admin/Admin-Inquiry.php");
    }
    else{
        echo 'ERROR Data Not Deleted';
    }

}
?>