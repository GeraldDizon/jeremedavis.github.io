<?php
   $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "edgarDavis";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS product(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Image VARCHAR(255) NOT NULL,
    3dLink VARCHAR(255) NOT NULL,
    Name VARCHAR(255) NOT NULL,
    Price INT(20) NOT NULL,
    Type VARCHAR(255) NOT NULL,
    Description VARCHAR(500) NOT NULL,
    Size VARCHAR(500) NOT NULL,
    Color VARCHAR(500) NOT NULL,
    Wood VARCHAR(500) NOT NULL,
    Featured INT(6) NOT NULL,
    Carousel INT(6) NOT NULL
    )";
    $query= $conn->prepare($sql);
    $conn->exec($sql);
    echo "Database tables successfully Created";

}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}

?>