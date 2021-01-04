<?php
	$servername = "localhost";
	$username   = "root";
	$password   = "";

try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE IF NOT EXISTS edgarDavis";
    $query= $conn->prepare($sql);
    $conn->exec($sql);
    echo "Database Successfully Created";
    echo "<br>";

}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}



?>