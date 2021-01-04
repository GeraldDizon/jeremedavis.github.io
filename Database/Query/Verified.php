<?php
require("../../Connection/Connect.php");

            // php delete data in mysql database using PDO

   try {
       $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
   } catch (PDOException $exc) {
       echo $exc->getMessage();
       exit();
   }
                
            $id = $_GET['id'];

            $sql = "UPDATE user SET Status = 'Verified'  WHERE id = :id";
            $query = $conn->prepare($sql);
            $result = $query->execute(array(":id"=>$id));

            if($result){
                header("Location: ../../Public/Home.php");
            } else {
                echo 'error';
            }

?>

