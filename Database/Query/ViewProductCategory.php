<?php
include('../Connection/Connect.php');
    // Create connection
    // Check connection
   	$categories =  $_GET['ProductCategories'];
    $sql = "SELECT * FROM product WHERE type = :categories";
    $query_view = $conn->prepare($sql);
    $executed = $query_view->execute(array(":categories"=>$categories));

if($executed){
  $ProductCategories = array();
  while ($row_product = $query_view->fetch(PDO::FETCH_ASSOC)){
        $ProductCategories[] = $row_product;
      }
}else{
    echo "error";
}

/*if (!isset($_SESSION['views'])) {
  $_SESSION['views'] = 0;
} else {
  $_SESSION['views']++;
}
 echo $_SESSION['views'];*/

?>