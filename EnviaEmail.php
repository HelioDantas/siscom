<?php

// inclui o autoloader do Composer
require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.phpmailer.php';
require 'PHPMailer/class.smtp.php';
require 'recovery_senha.php';

$Erro = null;
$mail = new PHPMailer;

function enviar($email , $mensagem)
{
$mail->Charset = "uft-8";
$mail->SMTPDebug = 3;
$mail->IsSMTP();
$mail->Host = "wmysdes01v";
$mail->SMTPAuth = true;
$mail->Username = "siscon.one@gmail.com";
$mail->Password = "mass2018";
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->FromName = "SisCon";
$mail->From = "siscon.one@gmail.com";
$mail->aAddAddress($email);
$mail->IsHTML(true);
$mail->Subject($titulo.date("H:i")."-".date("d/m/y"));  // titulo do mensagem
$mail->Body($mensagem);


if(!$mail->Send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    $Erro =true;
    exit;
 }
}

?>