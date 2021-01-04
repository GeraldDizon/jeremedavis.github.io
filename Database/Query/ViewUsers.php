<?php
require("../Connection/Connect.php");
    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }

    // Create connection
    // Check connection

    $page =isset($_GET['page'])? $_GET['page'] : 1 ;

    if($page == "" || $page == "1"){
        $page1 = 0;
    } else {
        $page1 = ($page*5)-5;
    }
    


    $paging = "SELECT * FROM user ORDER BY id DESC LIMIT $page1,5";
    $query_paging = $conn->prepare($paging);
    $executed = $query_paging->execute();
    $rows = array();
    while ($row = $query_paging->fetch(PDO::FETCH_ASSOC)){
        $rows[] = $row;
    }




    $sql = "SELECT * FROM user ORDER BY id DESC";
    $query = $conn->prepare($sql);
    $executed = $query->execute();
    $rowCount = $query->rowCount();
    $users = array();
    while ($row_users = $query->fetch(PDO::FETCH_ASSOC)){
        $users[] = $row_users;
    }




    
?>