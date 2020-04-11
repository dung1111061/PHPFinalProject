<?php
class mailPHP
{
	function send_html_mail($email_destination,$message) {

		
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1'; // Sending HTML mail, the Content-type header must be set
	$headers[] = "To: <$email_destination>";
	$headers[] = "From: ".ADMIN_MAIL;
	// $headers[] = 'Cc: birthdayarchive@example.com';
	// $headers[] = 'Bcc: birthdaycheck@example.com';

	// Sending mail
	return mail( $email_destination, 'mail he thong tu cua hang do dien tu', 
				 $message,implode("\r\n", $headers) );
	}
}