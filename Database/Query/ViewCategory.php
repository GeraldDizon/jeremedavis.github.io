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
    


    $sql = "SELECT * FROM categories  ORDER BY ProductCategories ASC LIMIT $page1,5";
    $query_view = $conn->prepare($sql);
    $executed = $query_view->execute();

if($executed){
    $categories = array();
	while ($row_categories = $query_view->fetch(PDO::FETCH_ASSOC)){
        $categories[] = $row_categories;
    }
}else{
    echo "error";
}




    $sql = "SELECT * FROM categories  ORDER BY ProductCategories ASC";
    $query_view = $conn->prepare($sql);
    $executed = $query_view->execute();
    $rowCount = $query_view->rowCount();

/*if (!isset($_SESSION['views'])) {
  $_SESSION['views'] = 0;
} else {
  $_SESSION['views']++;
}
 echo $_SESSION['views'];*/

?>