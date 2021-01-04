<?php
include('../Connection/Connect.php');
    if(isset($_POST['DeleteCategory']))
    {   
         // get id to delete
        $id = $_POST['id'];
        $sql = "DELETE FROM categories WHERE id = :id";
        $query = $conn->prepare($sql);
        $result = $query->execute(array(":id"=>$id));
        
        if($result)
        {
            header("Location: ../Admin/Admin-AddCategory.php");
        }
        else{
            echo 'ERROR Data Not Deleted';
        }

    }
?>