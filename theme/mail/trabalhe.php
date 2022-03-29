<?php
	if($_POST['email']){

		include '../include/mailer/PHPMailerAutoload.php';
		include 'anexo.php';

		$anexo = anexo( $_POST['nome'],$_FILES['anexo'] );
		/*if($anexo['error']){
			$msg_error = $anexo['error'];
			$header_url = "Location: http://www.ceramfix.com.br/?page_id=152&form=error&msg={$msg_error}"
			header($header_url);
			exit;
		}*/
			
		$mail = new PHPMailer();
		$mail->IsSMTP();

		$mail->Host = 'localhost';
		$mail->SMTPAuth = false;
		$mail->SMTPAutoTLS = false; 
		$mail->Port = 25; 
		$mail->CharSet = 'UTF-8';
		
		$mail->setFrom($_POST['para'],$_POST['nome_site']);
		$mail->addAddress($_POST['para'],$_POST['nome_site']);
		$mail->addReplyTo($_POST['email'],$_POST['nome']);

		//$mail->addAddress('edertton@gmail.com');
		
		//$mail->addCC('edertton@gmail.com');
		$mail->addBCC('edertton@gmail.com');

		$body = '';
		$body .= '<strong>' . $_POST['nome'] . '</strong><br>';
		$body .= $_POST['email'] . '<br>';
		$body .= $_POST['tel_princ'];
        if($_POST['tel_sec']){
        	$body .= ' / ' . $_POST['tel_sec'];
        }
        $body .= '<br>';
        $body .= $_POST['endereco'] . '<br>';
		$body .= $_POST['cidade'] . ', ' . $_POST['estado'] . '<br>';
		$body .= '<br>' . $_POST['mensagem'] . '<br>';

		$mail->isHTML(true);
		$mail->Subject = $_POST['subject'] . ', ' . $_POST['nome'];
		$mail->Body    = $body;
		$mail->AltBody = $body;

		if($anexo){
			$mail->AddAttachment($anexo['url'],$anexo['nome']);		
		}	
		
		if(!$mail->Send()) {
            header("Location: http://www.ceramfix.com.br/?page_id=152&form=error");
		} else {
			header("Location: http://www.ceramfix.com.br/?page_id=152&form=success");
		}

	}else{
		header("Location: http://www.ceramfix.com.br/?page_id=152&form=error");
	}
?>