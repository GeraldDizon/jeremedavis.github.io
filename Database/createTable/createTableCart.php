<?php
   $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "edgarDavis";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS cart(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(255) NOT NULL,
    Quantity VARCHAR(255) NOT NULL,
    Price INT(20) NOT NULL,
    Subtotal INT(20) NOT NULL,
    BuyerId INT(20) NOT NULL
    )";
    $query= $conn->prepare($sql);
    $conn->exec($sql);
    echo "Database tables successfully Created";

}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}

?>