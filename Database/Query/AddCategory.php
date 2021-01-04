<?php
require("../Connection/Connect.php");

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
if(isset($_POST['AddCategory'])){

    //Get data from input type boxes
    $ProductCategory = $_POST['category'];

    // prepare sql and bind parameters
    $sql = "INSERT INTO categories(ProductCategories) VALUES (?)";
    $query = $conn->prepare($sql);
    $stmt = $query->execute(array($ProductCategory));

if($stmt)
    {
        header("Location: ../Admin/Admin-AddCategory.php");
    }else{
        echo 'Data Not Inserted';
    }

}


?>