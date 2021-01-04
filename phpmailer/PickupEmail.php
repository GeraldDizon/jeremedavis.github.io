<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Load composer's autoloader
    require 'vendor/autoload.php';

    if(isset($_POST['pickup'])){

    $Email = $_POST['Email'];

    $mail = new PHPMailer;  

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'geralddizon84@gmail.com';
    $mail->Password = '090866937naruga1';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->From = 'geralddizon84@gmail.com';
    $mail->FromName = 'Gerald Dizon';
    $mail->addAddress($Email, 'Gerald Dizon');

    $mail->Subject = 'Order ready';
    $mail->Body = 'Your Order is ready for pickup';
    $mail->AltBody = 'Your Order is ready for pickup';
    if($mail->send()){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "edgarDavis";

            // php delete data in mysql database using PDO

                try {
                    $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                    exit();
                }
                
                 // get id to delete

            $id = $_POST['id'];

            $sql = "UPDATE shippingdetails SET Status = 'Pickup'  WHERE id = :id";
            $query = $conn->prepare($sql);
            $result = $query->execute(array(":id"=>$id));

            if($result){
                echo 'Succesfully edited';
            } else {
                echo 'error';
            }

    }else{
        echo "error";
    }
    header("Location: ../Admin/Admin-Orders.php");
}
?>