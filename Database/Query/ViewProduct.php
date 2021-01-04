<?php
    include('../Connection/Connect.php');

    // Create connection
    // Check connection


    $page =isset($_GET['page'])? $_GET['page'] : 1 ;

    if($page == "" || $page == "1"){
        $page1 = 0;
    } else {
        $page1 = ($page*5)-5;
    }
    


    $sql = "SELECT * FROM product  ORDER BY id DESC";
    $query = $conn->prepare($sql);
    $executed = $query->execute();
    $rows = array();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        $rows[] = $row;
    }



    $sql = "SELECT * FROM product  ORDER BY id DESC";
    $query = $conn->prepare($sql);
    $executed = $query->execute();
    $rowCount = $query->rowCount();
?>