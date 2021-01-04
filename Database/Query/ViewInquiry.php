<?php
include('../Connection/Connect.php');

    $sql = "SELECT id, Name, Email, ContactNumber, Address, Comment FROM inquiry  ORDER BY id DESC";
    $query_view = $conn->prepare($sql);
    $executed = $query_view->execute();
    $rows = array();
    while ($row = $query_view->fetch(PDO::FETCH_ASSOC)){
        $rows[] = $row;
    }
    
?>