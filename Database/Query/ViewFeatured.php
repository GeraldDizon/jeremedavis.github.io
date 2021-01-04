<?php
include('../Connection/Connect.php');


	    $page =isset($_GET['page'])? $_GET['page'] : 1 ;

    if($page == "" || $page == "1"){
        $page1 = 0;
    } else {
        $page1 = ($page*5)-5;
    }
    


    $paging = "SELECT id, Image, Featured FROM product LIMIT $page1,5 ";
    $query_paging = $conn->prepare($paging);
    $executed = $query_paging->execute();
    $rows = array();
    while ($row = $query_paging->fetch(PDO::FETCH_ASSOC)){
        $rows[] = $row;
    }




	$value = "1";

    $sql = "SELECT id, Image, Featured FROM product WHERE Featured = $value";
    $query_featured = $conn->prepare($sql);
    $executed = $query_featured->execute();
    $rowCount = $query_featured->rowCount();
    $rows_featured = array();
    while ($row = $query_featured->fetch(PDO::FETCH_ASSOC)){
        $rows_featured[] = $row;
    }
    
?>