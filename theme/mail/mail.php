<?php
	if($_GET['email']){

		include '../include/mailer/PHPMailerAutoload.php';
		//include 'anexo.php';

		//$anexo = anexo( $_GET['nome'],$_FILES['anexo'] );
			
		$mail = new PHPMailer();
		$mail->IsSMTP();

		$mail->Host = 'localhost';
		$mail->SMTPAuth = false;
		$mail->SMTPAutoTLS = false; 
		$mail->Port = 25; 
		$mail->CharSet = 'UTF-8';
		
		$mail->setFrom($_GET['para'],$_GET['nome_site']);
		$mail->addAddress($_GET['para'],$_GET['nome_site']);
		$mail->addReplyTo($_GET['email'],$_GET['nome']);

		//$mail->addAddress('edertton@gmail.com');
		
		//$mail->addCC('edertton@gmail.com');
		$mail->addBCC('edertton@gmail.com');

		$body = '';
		$body .= '<strong>' . $_GET['nome'] . '</strong><br>';
		$body .= $_GET['email'] . '<br>';
		$body .= $_GET['telefone'] . '<br>';
		$body .= $_GET['cidade'] . ', ' . $_GET['estado'] . '<br>';
		$body .= '<br>' . $_GET['mensagem'] . '<br>';

		$mail->isHTML(true);
		$mail->Subject = $_GET['subject'] . ', ' . $_GET['nome'];
		$mail->Body    = $body;
		$mail->AltBody = $body;

		/*if($anexo){
			$mail->AddAttachment($anexo['url'],$anexo['nome']);		
		}*/	
		
		if(!$mail->Send()) {
            echo(json_encode("Desculpe, não foi possível enviar seu formulário. <br>Por favor, tente novamente mais tarde."));
		} else {
			echo(json_encode('ok'));
		}

	}else{
		echo(json_encode("Desculpe, não foi possível enviar seu formulário. <br>Por favor, tente novamente mais tarde."));
	}
?>