<?php
require("../Connection/Connect.php");
if(isset($_POST['signUp'])){
try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}


    //Get data from input type boxes
    $Firstname = $_POST['firstname'];
    $Lastname = $_POST['lastname'];
    $Address = $_POST['address'];
    $Contact = $_POST['contact'];
    $EmailAddress = $_POST['email'];
    $Password = $_POST['password'];
    $ConfirmPassword = $_POST['ConfirmPassword'];


    //Check for existing email.
    $sql = "SELECT EmailAddress FROM user WHERE EmailAddress = :EmailAddress";
    $query = $conn->prepare($sql);
    $stmt = $query->execute(array(":EmailAddress"=>$EmailAddress));




//Form Validation
    if(empty($_POST) === false){
        $errorsSignUp = array();

            if(empty($Firstname) == true || empty($Lastname) == true || empty($Address) == true || empty($Contact) == true || empty($EmailAddress) == true || empty($Password) == true || empty($ConfirmPassword) == true){
            $errorsSignUp[] = "Please don't leave a blank";
            }
             if(ctype_alpha($Firstname) === false){
                if (!ctype_alpha(str_replace(' ', '', $Firstname))){
                    $errorsSignUp[] = "Firstname must only Contain Letters";
                }
            }

            if(ctype_alpha($Lastname) === false){
                if (!ctype_alpha(str_replace(' ', '', $Lastname))){
                    $errorsSignUp[] = "Lastname must only Contain Letters";
                }
            }
            if(ctype_digit($Contact) === false){
                $errorsSignUp[] = "That's not a valid Contact Number";
            }
            if(filter_var($EmailAddress, FILTER_VALIDATE_EMAIL) === false){
                $errorsSignUp[] = "Thats not a valid Email Address";  
            }

            if($row = $query->fetch(PDO::FETCH_ASSOC)){
                $errorsSignUp[] = "Email Address already in use";   
             }

            if($ConfirmPassword != $Password){
                $errorsSignUp[] = "Password does not match";
            }   


    else{
        if(empty($errorsSignUp) === true){
                // prepare sql and bind parameters
                $verify = 'Pending';
                $sql = "INSERT INTO user (Firstname, Lastname, Address, Contact, EmailAddress, Password, Status) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $query = $conn->prepare($sql);
                $stmt = $query->execute(array($Firstname,$Lastname,$Address,$Contact,$EmailAddress,$Password, $verify));

                if($stmt){
    //Check if post are empty or input type data are not gathered.
                        $sql = "SELECT * FROM user WHERE EmailAddress = :EmailAddress";
                        $query_view = $conn->prepare($sql);
                        $stmt = $query_view->execute(array(":EmailAddress"=>$EmailAddress));

                        if($row = $query_view->fetch(PDO::FETCH_ASSOC)){
                        //Session Set variable = Set Database Column Name
                        $_SESSION['idbase'] = $row['id'];
                        $_SESSION['firstname'] = $row['Firstname'];
                        $_SESSION['lastname'] = $row['Lastname'];
                        $_SESSION['Email'] = $row['EmailAddress'];
                        $_SESSION['contact'] = $row['Contact'];
                        $_SESSION['address'] = $row['Address'];
                        $_SESSION['status'] = $row['Status'];
                        require('../phpmailer/EmailVerification.php');
                        header("Location: EdgarDavis(close)/Public/Home.php");
                        //Send Verification Email


                        //Load composer's autoloader

                                    
                    }

                }
        
        }
    }
}
}


?>