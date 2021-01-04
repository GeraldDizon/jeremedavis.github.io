<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Load composer's autoloader
    require 'vendor/autoload.php';

    if(isset($_POST['delivery'])){

    $email = $_POST['Email'];
    $name = $_POST['Name'];
    $mail = new PHPMailer;  

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'jeremedavis84@gmail.com';
    $mail->Password = '090866937';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->From = 'jeremedavis84@gmail.com';
    $mail->FromName = 'Jereme Davis';
    $mail->addAddress($email, $name);

    $mail->Subject = 'Order Shipped';
    $mail->Body = 'Order Shipped Your order has shipped';
    $mail->AltBody = 'Order Shipped Your order has shipped';
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

            $sql = "UPDATE shippingdetails SET Status = 'Shipping'  WHERE id = :id";
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