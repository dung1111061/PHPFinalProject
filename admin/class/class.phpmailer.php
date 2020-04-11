<?php
include COMPONENT_PATH."PHPmailer/PHPMailer-master/src/PHPMailer.php";
include COMPONENT_PATH."PHPmailer/PHPMailer-master/src/Exception.php";
include COMPONENT_PATH."PHPmailer/PHPMailer-master/src/OAuth.php";
include COMPONENT_PATH."PHPmailer/PHPMailer-master/src/POP3.php";
include COMPONENT_PATH."PHPmailer/PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailer
{
	function send_html_mail($email_destination,$message) {

		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try {
		    //Server settings
		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = ADMIN_MAIL;                 // SMTP username
		    $mail->Password = 'vmmgkcazjkaiymls';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to
		 
		    //Recipients
		    $mail->setFrom(ADMIN_MAIL, 'Mailer');
		    // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
		    $mail->addAddress($email_destination);               // Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');
		 
		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		 
		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'mail he thong tu cua hang do dien tu';
		    $mail->Body    = $message;
			
			//		 
			ob_start();
		    $mail->send();
		    ob_get_clean();
		    return true;

		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		    return false;
		}
	}
}