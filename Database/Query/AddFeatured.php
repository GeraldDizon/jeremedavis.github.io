<?php
require("../Connection/Connect.php");
if(isset($_POST['AddFeatured'])){

    try {
        $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     // get id to delete

    echo $id = $_POST['id'];
    if(isset($_POST['test'])){
        $featured = "1";
    } else {
        $featured = "0";
    }




    $sql = "UPDATE product SET Featured = :featured  WHERE id = :id";
    $query = $conn->prepare($sql);
    $result = $query->execute(array(":featured"=>$featured, ":id"=>$id));

    if($result){
        header("Location: ../Admin/Admin-AddFeaturedItem.php");
    } else {
        echo 'error';
    }

    }


?>


