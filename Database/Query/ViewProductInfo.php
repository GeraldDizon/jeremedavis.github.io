<?php
include('../Connection/Connect.php');
    // Create connection
    // Check connection
    $id =  (int)$_GET['id'];
    $sql = "SELECT * FROM product WHERE id = :id";
    $query_view = $conn->prepare($sql);
    $executed = $query_view->execute(array(":id"=>$id));

if($executed){
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