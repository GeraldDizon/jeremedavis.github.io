<?php
include('../Connection/Connect.php');


    $value = "1";

    $sql = "SELECT id, Image, Carousel FROM product WHERE Carousel = $value";
    $query = $conn->prepare($sql);
    $executed = $query->execute();
    $rows_carousel = array();
    $rowCount = $query->rowCount();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        $rows_carousel[] = $row;
    }


    
?>