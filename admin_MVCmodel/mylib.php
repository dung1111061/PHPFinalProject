<?php

function verify_privilege($required_privilege) {
	if($_SESSION['privilege_user'] < $required_privilege) {
	  unset($_SESSION['privilege_user']);
	  ?>
		Administrator required to edit/delete.
		<a href="index.php"> Back to login again</a>
	  <?php	
	   exit();
	}
}

// Designed by Nguyen Dung 12/23/2019
function send_html_mail($email_source,$email_destination,$data_arr = array(),$content_html_file) {

// The message
//------- Comment Code
	// $data = array('link' => $link);
	// $opts = array(
	// 'http' => array(
	// 	    'method'  => 'POST',
	// 	    'content' => http_build_query($data)
	// 	)
	// );
	// $context  = stream_context_create($opts);
	// $content = file_get_contents("restore_email_testing.php", false, $context);
//-------

	$content = file_get_contents("$content_html_file"); // get content
	$message = $content;
	// passing variables
	foreach ($data_arr as $key => $value) {
		$message = str_replace("<?=\$$key?>", $value, $content);
	}

//------- Test passing variable
	// $message = $content;
	// $message = sprintf($content, $link);
	// $message = "pseudo message";
//------- Comment Code

//------- Debug HTML content by load page
	// echo "$message";
//------- Comment Code

// Additional headers
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1'; // Sending HTML mail, the Content-type header must be set
	$headers[] = "To: <$email_destination>";
	$headers[] = "From: $email_source";
	// $headers[] = 'Cc: birthdayarchive@example.com';
	// $headers[] = 'Bcc: birthdaycheck@example.com';

// Sending mail
	return mail($email_destination, 'Restore Password Administrator', $message,implode("\r\n", $headers));

}