<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    $id = $_SESSION['idbase'];
    $name = $_SESSION['firstname'];
    $email = $_SESSION['Email'];

    $mail = new PHPMailer;  

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'geraldchris84@gmail.com';
    $mail->Password = '090866937N@ruga1';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->From = 'geraldchris84@gmail.com';
    $mail->FromName = 'Jereme Davis';
    $mail->addAddress($email, $name);

    $mail->Subject = 'Verify your email address';
    $mail->Body = "<a href = 'localhost/EdgarDavis(close)/Database/Query/Verified.php?id=$id'>Verify my email</a>";
    $mail->AltBody =  "<a href = 'localhost/EdgarDavis(close)/Database/Query/Verified.php?id=$id'>Verify my email</a>";

    /*$mail->Body = "<a href = 'http://www.jeremedavis.xyz/Database/Query/Verified.php?id=$id'>Verify my email</a>";
    $mail->AltBody =  "<a href = 'http://www.jeremedavis.xyz/Database/Query/Verified.php?id=$id'>Verify my email</a>";*/
    if($mail->send()){
        header("Location: ../Public/Profile.php");
    }
?>
