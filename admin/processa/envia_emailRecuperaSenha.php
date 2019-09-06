<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('PHPMailer/src/Exception.php');
require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/SMTP.php');

date_default_timezone_set('America/Sao_Paulo');
	
	function enviaMailCliente($mailDestino, $assunto, $mensagem){

		//Create a new PHPMailer instance
		$mail = new PHPMailer();

		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		// Define os dados técnicos da Mensagem
		$mail->IsHTML(true);
		$mail->CharSet = 'UTF-8';

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;

		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';//utilizado para o servidor do GMAIL, desabilitar caso seja outro servidor

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;// Caso o servidor SMTP precise de autenticação

		//Informe o endereço de seu e-mail
		$mail->Username = 'bb.roger.bb@gmail.com';

		//Informe a senha do seu e-mail
		$mail->Password = '';

		//Set who the message is to be sent from
		$mail->From = ('bb.roger.bb@gmail.com');
		$mail->FromName = ('Rogerio');

		//Set an alternative reply-to address
		$mail->addReplyTo('bb.roger.bb@gmail.com', 'Rogerio');

		//Set who the message is to be sent to
		$mail->AddAddress($mailDestino);
		$mail->WordWrap = 50; // Definir quebra de linha
		$mail->Subject = $assunto;
		$mail->Body = $mensagem;
		//$mail->msgHTML(file_get_contents('PHPMailer/contentsNewsCliente.html'), __DIR__);

		//Replace the plain text body with one created manually
		//$mail->AltBody = "$mensagem";//PlainText, para caso quem receber o email não aceite o corpo HTML

		//Attach an image file
		//Inclusão de anexos
		//$mail->addAttachment('images/phpmailer_mini.png');

		//send the message, check for errors
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
			//Section 2: IMAP
			//Uncomment these to save your message in the 'Sent Mail' folder.
			#if (save_mail($mail)) {
			#    echo "Message saved!";
			#}
		}

		//Section 2: IMAP
		//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
		//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
		//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
		//be useful if you are trying to get this working on a non-Gmail IMAP server.
		//função para salvar o email enviado na sua caixa do GMAIL
		function save_mail($mail)
		{
			//You can change 'Sent Mail' to any other folder or tag
			$path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

			//Tell your server to open an IMAP connection using the same username and password as you used for SMTP
			$imapStream = imap_open($path, $mail->Username, $mail->Password);

			$result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
			imap_close($imapStream);

			return $result;
		}

	}
?>
