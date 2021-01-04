<?php
require("../Connection/Connect.php");

// php delete data in mysql database using PDO
if(isset($_POST['DeleteProduct']))
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     // get id to delete
    $id = $_POST['id'];
    $image = $_POST['ImageFile'];
if (file_exists($image)){
    if (unlink($image)) {   
    } else {
        echo "fail";    
    }   
} else {
    echo "file does not exist";
    echo $image;
}
     // mysql delete query 

    $sql = "DELETE FROM product WHERE id = :id";
    $query = $conn->prepare($sql);
    $result = $query->execute(array(":id"=>$id));
    
    if($result)
    {
        header("Location: ../Admin/Admin-AddProduct.php");
    }
    else{
        echo 'ERROR Data Not Deleted';
    }

}
?>