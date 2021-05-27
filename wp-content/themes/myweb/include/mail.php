<?php
		$servidor = 'smtp.office365.com';
		$porta = 587;
		$usuario = 'site@ceramfix.com.br';
		$senha = 'Cer@2020*!';

		$assunto = 'Teste de envio';
		$mensagem = 'Mensagem do e-mail';




//Import the PHPMailer class into the global namespace
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

//require '../vendor/autoload.php'; 

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'mail.example.com';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'yourname@example.com';
//Password to use for SMTP authentication
$mail->Password = 'yourpassword';
//Set who the message is to be sent from
$mail->setFrom('from@example.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('whoto@example.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}







       //require 'mailer/PHPMailerAutoload.php';
/*
require 'mail/PHPMailer.php';
//require 'mailer/class.phpmailer.php';


$mail = new PHPMailer();

$mail->SMTPDebug = 2;    

// DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = $servidor; // Seu endereço de host SMTP
$mail->SMTPAuth = false; // Define que será utilizada a autenticação -  Mantenha o valor "true"
$mail->Port = $porta; // Porta de comunicação SMTP - Mantenha o valor "587"

$mail->SMTPSecure = false;
$mail->SMTPAutoTLS = false;

echo '<br>OK 3<br>';

$mail->Username = $usuario; // Conta de email existente e ativa em seu domínio
$mail->Password = $senha; // Senha da sua conta de email
 
// DADOS DO REMETENTE
$mail->Sender = $usuario; // Conta de email existente e ativa em seu domínio
$mail->From = $usuario; // Sua conta de email que será remetente da mensagem
$mail->FromName = "fulano"; // Nome da conta de email
 
// DADOS DO DESTINATÁRIO
$mail->AddAddress($usuario, 'Assunto'); // Define qual conta de email receberá a mensagem
//$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
//$mail->AddCC('copia@dominio.net'); // Define qual conta de email receberá uma cópia
//$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
 
// Definição de HTML/codificação
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
 
// DEFINIÇÃO DA MENSAGEM
$mail->Subject  = "Solicitação de Assinatura"; // Assunto da mensagem
$mail->Body = " <strong> Nome: </strong>";
 
// ENVIO DO EMAIL
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
 
// Exibe uma mensagem de resultado do envio (sucesso/erro)
if($enviado){
  echo "<br>E-mail enviado com sucesso!";
}else{
  echo "<br>Não foi possível enviar o e-mail.";
  echo "<br><b>Detalhes do erro:</b><br>" . $mail->ErrorInfo;
}
*/
?>