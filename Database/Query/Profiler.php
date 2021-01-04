<?php
require("../Connection/Connect.php");
if(isset($_POST['profile'])){
try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}



    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];



    //Check for existing email.



//Form Validation
    if(empty($_POST) === false){
        $errorsSignUp = array();

            if(empty($firstname) == true || empty($lastname) == true || empty($contact) == true || empty($address) == true){
            $errorsSignUp[] = "Please don't leave a blank";
            }

            if(ctype_alpha($firstname) === false){
                if (!ctype_alpha(str_replace(' ', '', $firstname))){
                    $errorsSignUp[] = "Firstname must only Contain Letters";
                }
            }

            if(ctype_alpha($lastname) === false){
                if (!ctype_alpha(str_replace(' ', '', $lastname))){
                    $errorsSignUp[] = "Lastname must only Contain Letters";
                }
            }

            if(ctype_digit($contact) === false){
                $errorsSignUp[] = "Invalid Contact Number";
            }


    else{
        if(empty($errorsSignUp) === true){
                // prepare sql and bind parameters

                $id = $_SESSION['idbase'];


                $sql = "UPDATE user SET Firstname = :firstname, Lastname = :lastname, Address = :address, Contact = :contact  WHERE id = :id";
                $query = $conn->prepare($sql);
                $result = $query->execute(array(":firstname"=>$firstname, ":lastname"=>$lastname, ":contact"=>$contact, ":address"=>$address,  ":id"=>$id));

                if($result){
                    header("Location ../../Public/Home.php");
                    $_SESSION['firstname'] = $firstname = $_POST['firstname'];
                    $_SESSION['lastname'] = $lastname = $_POST['lastname'];
                    $_SESSION['contact'] = $contact = $_POST['contact'];
                    $_SESSION['address'] = $address = $_POST['address'];
    
                } else {
                    echo "Error updating profile";
                }

        }
        
        }
    }
}



?>