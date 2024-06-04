<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['envoyer'])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->HOST = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nanncyrato@gmail.com';
    $mail->Password = 'Nan2002cy';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom( 'nanncyrato@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["sujet"];
    $mail->Body = $_POST["message"];

    $mail->send();

    echo "<script>alert('envoie reussie')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mail</title>
</head>
<body>
    <form action="" method="post">
        Email : <input type="email" name="email" id="email"></br>
        Sujet : <input type="text" name="sujet" id="sujet"></br>
        Message : <input type="text" name="message" id="message"></br>
        <button type="submit" name="envoyer">Envoyer</button>
    </form>
</body>
</html>