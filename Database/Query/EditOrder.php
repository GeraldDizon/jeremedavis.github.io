<?php
/*require("../Connection/Connect.php");

// php delete data in mysql database using PDO
if(isset($_POST['EditProduct']))
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     // get id to delete


    $id = $_POST['idbase'];
    $ProductName = $_POST['name'];
    $Quantity = $_POST['quantity'];
    $Price = $_POST['cost'];
    $Subtotal = $_POST['subtotal'];



$sql = "UPDATE cart SET ProductName = :name, Quantity = :quantity, Price = :cost, Subtotal = :subtotal WHERE id = :idbase";
$query = $conn->prepare($sql);
$result = $query->execute(array(":name"=>$ProductName, ":quantity"=>$Quantity, ":cost"=>$Price, ":subtotal"=>$Subtotal, ":idbase"=>$id));

if($result){
    header("Location: ../Public/Cart.php");
} else {
    echo 'error';
}

}*/

 $connect = mysqli_connect("localhost", "root", "", "edgardavis");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE cart SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  

?>


