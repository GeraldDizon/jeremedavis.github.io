<?php
require("../Connection/Connect.php");
if(isset($_POST['Inquiry'])){
try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}


    //Get data from input type boxes
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $ContactNumber = $_POST['Contact'];
    $Comment = $_POST['Comment'];

    // prepare sql and bind parameters
    $sql = "INSERT INTO inquiry (Name, Email, ContactNumber, Comment) VALUES (?, ?, ?, ?)";
    $query = $conn->prepare($sql);
    $stmt = $query->execute(array($Name,$Email,$ContactNumber,$Comment));

if($stmt)
    {
        echo"<script>";
        echo'alert("Thank you for contacting us,\nYou\'ll receive a reply on your email or cellphone.")';
        echo"</script";
    }else{
        echo 'Data Not Inserted';
    }

}


?>