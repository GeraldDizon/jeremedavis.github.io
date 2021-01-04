<?php
require("../Connection/Connect.php");
if(isset($_POST['AddCarousel'])){

    try {
        $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     // get id to delete

    echo $id = $_POST['id'];
    if(isset($_POST['test'])){
        $Carousel = "1";
    } else {
        $Carousel = "0";
    }




    $sql = "UPDATE product SET Carousel = :carousel  WHERE id = :id";
    $query = $conn->prepare($sql);
    $result = $query->execute(array(":carousel"=>$Carousel, ":id"=>$id));

    if($result){
        header("Location: ../Admin/Admin-AddCarousel.php");
    } else {
        echo 'error';
    }

    }


?>


