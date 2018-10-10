<?php




/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception ;
require_once 'email/vendor/autoload.php';
//enviar("rafaelalvarenga46@gmail.com", "rafael", "<p> olá </p>");

function enviar($destinatrio ,$nome , $mensagem)

{
    $mail = new PHPMailer(true);  
try {
//Create a new PHPMailer instance

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 2;

//set o servidor de email
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "siscon.one@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "mass2018";

//Set who the message is to be sent from
$mail->setFrom('siscon.one@gmail.com', 'SisCon one');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($destinatrio,$nome);

//Set the subject line


//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->isHTML(true);
$mail->Subject = 'Recovery the of password';
$mail->Body    = 'Sua nova senha é <b>"'.$mensagem.'"!</b>';
$mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';
//$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');


// add anexos
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
$mail->send();
 

    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}

} catch (Exception $e) {
    throw  $e; 
    //'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}


//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
