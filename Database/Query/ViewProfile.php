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

    $id = $_SESSION['idbase'];


    $sql = "SELECT * FROM user WHERE id = $id";
    $query = $conn->prepare($sql);
    $executed = $query->execute();
    $rowCount = $query->rowCount();
    $profile = array();
    while ($row_profile = $query->fetch(PDO::FETCH_ASSOC)){
        $profile[] = $row_profile;
    }

    foreach($profile as $row){
        $firstname = $row['Firstname'];
        $lastname = $row['Lastname'];
        $address = $row['Address'];
        $contact = $row['Contact'];
        $email = $row['EmailAddress'];
    }
?>