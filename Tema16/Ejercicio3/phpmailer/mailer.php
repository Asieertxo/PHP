<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function mailer($conect){

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($conect){
    $mensaje = "Un usuario se ha conectado a la base de datos";
}else{
    $mensaje = "Ha habido un intento de conexion a la base de datos";
}

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = /*SMTP::DEBUG_SERVER*/ 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'PHPMailerAsier@gmail.com';                     //SMTP username
    $mail->Password   = 'Hol@1234';                               //SMTP password
    $mail->SMTPSecure = /*PHPMailer::ENCRYPTION_SMTPS*/'tls';            //Enable implicit TLS encryption
    $mail->Port       = /*465*/587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('PHPMailerAsier@gmail.com', 'Asier');
    $mail->addAddress('PHPMailerAsier@gmail.com');     //Add a recipient

/*  //Attachments                           ------PARA PODER ENVIAR IMAGENES O ARCHIVOS-----
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name*/

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Asunto muy importante';
    $mail->Body    = $mensaje;

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}



?>