<?php
   $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "edgarDavis";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS Shipping(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ShippingAddress VARCHAR(255) NOT NULL,
    ShippingFee INT(20) NOT NULL
    )";
    $query= $conn->prepare($sql);
    $conn->exec($sql);
    echo "Database tables successfully Created";

}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}

?>