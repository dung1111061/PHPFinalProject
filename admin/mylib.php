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

/**
* delete image on server
* @param  [type] $filename [description]
* @return [type]           [Returns TRUE on success or FALSE on failure.]
*/
function delete_image($filename){
	if (file_exists($filename)) {
	  unlink($filename);
	  echo 'File '.$filename.' has been deleted';
	  return TRUE;
	} else {
	  echo 'Could not delete '.$filename.', file does not exist';
	  return FALSE;
	}
}

/**
 * [verify_image verify uploaded file as supported image]
 * @param  [type] $name [description]
 * @return [type]       [error code 
 *                           0: valid image 
 *                      ]
 */
function verify_image($name){

	if ($_FILES[$name]['tmp_name']) {

	  if ( !($_FILES[$name]['error'] == 0 or  $_FILES[$name]['error'] == 4) ) {
	    echo "File error";
	    return 2;
	  }
	  
	  if (!in_array($_FILES[$name]['type'], supported_file_type_array)) {
	    echo "File not suppported";
	    return 3;
	  }

	}
	else {
	  echo "File not found";
	  return 1;
	}

	echo "File valid as image";
	return 0;
}

  /**
   * [difference_time description]
   * @param  string $start_time [default refer to now time]
   * @param  string $end_time   [description]
   * @return [string] $diff_time [ difference time describe text displayed in conversation table]
   */
  function difference_time($start_time="",$end_time=""){
  	// Calculating difference times 	
	$start_date = new DateTime($start_time,new DateTimeZone(TIME_ZONE));
	$now        = new DateTime($end_time  ,new DateTimeZone(TIME_ZONE));
	$since_start = $start_date->diff($now);
	
	// Ex: 1 days
	$diff_time  = "recent";
	$time_format_table = array("y"=>"years","m"=>"months","d"=>"days",
		"h"=>"hours","i"=>"mins","s"=>"seconds");
	foreach ( $time_format_table as $format => 
		$postfix ) {
		if ($since_start->format("%$format")){
			$diff_time = $since_start->format("%$format $postfix"); //Ex: 1 hours
			break;
		} 
		
	}
	return $diff_time;
  }