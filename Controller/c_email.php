<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

$correoBienvenida = crearMail("lavalleies9024@gmail.com", "Bienvenido a nuestra comunidad, estamos felices que formes parte y que aportes al futuro de nuestro pais");





function crearMail($emisor, $mensaje,)
{
    $mail = new PHPMailer(true);
    //Server settings para el acceso a la cuenta emisora
    $mail->SMTPDebug = 0;                      // debug output
    $mail->isSMTP();                            //protocolo que se va usar para el envio
    $mail->Host       = 'smtp.gmail.com';                     //Settear SMTP server 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'lavalleies9024@gmail.com';      //SMTP usuario cuenta de gmail
    $mail->Password   = 'egqc jeiv gxlw clzz';

    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Receptores y envio
    $mail->setFrom($emisor, 'Ricardo');

    $mail->addReplyTo('lavalleies9024@gmail.com', 'Informacion de Respuesta');


    //Attachments

    //$mail->addAttachment('imagenes/iesLogo.png');    adjuntar archivos
    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Secretaria Estudiantil';
    $mail->Body    = $mensaje;
    return $mail;
}


function sendMail($mail, $destinatario)
{
    try {
        $mail->addAddress($destinatario);
        $mail->send();
    } catch (Exception $e) {
        echo "No se pudo enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
    }
}
