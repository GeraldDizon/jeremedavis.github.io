<?php
   $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "edgarDavis";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS inquiry(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    ContactNumber INT(20) NOT NULL,
    Address VARCHAR(255) NOT NULL,
    Comment VARCHAR(255) NOT NULL
    )";
    $query= $conn->prepare($sql);
    $conn->exec($sql);
    echo "Database tables successfully Created";

}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}

?>