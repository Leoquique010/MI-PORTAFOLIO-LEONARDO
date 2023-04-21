<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$destino ="leonardo.gr.99@gmail.com";

$nombre= $_POST["nombre"];
$email= $_POST["email"];
$asunto= $_POST["asunto"];
$mensaje= $_POST["mensaje"];
$contenido="Nombre: " . $nombre . "\nCorreo: " . $email . "\nAsunto: " . $asunto . "\nMensaje: " . $mensaje;

//$mail($destino, "FROM: ".$asunto, $message, $contenido);

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'leonardo.gr.99@gmail.com';                     //SMTP username
    $mail->Password   = 'oynbjcmsmgnjqhqp';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email,$nombre);
    //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress($destino);               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $contenido;
    $mail->AltBody = $mensaje;

    $mail->send();
    echo "<script>setTimeout(\"location.href='contacto.html'\",1000)</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>