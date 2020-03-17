<?php

function formatString2URL($string){
	$string = str_replace(" ", "-", $string);
	return $string;
}

//
function verify_privilege($required_privilege) {
	if($_SESSION['privilege_user'] < $required_privilege) {
	  unset($_SESSION['privilege_user']);
	  ?>
		Administrator required to edit/delete.
		<a href="trang-chu.html> Back to login again</a>
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
* @param  [type] $filename [name of file following relative file path]
* @return [type]           [Returns TRUE on success or FALSE on failure.]
*/
function delete_image($filename){
	if (file_exists($filename)) {
	  unlink($filename);
	  echo 'File '.$filename.' has been deleted <br>';
	  return TRUE;
	} else {
	  echo 'Could not delete '.$filename.', file does not exist <br>';
	  return FALSE;
	}
}

/**
 * [verify_uploadFile: verify form-by-uploaded user file with the file array]
 * @param  [type] $name [ the use of the file upload name]
 * @return [type]       [upload status code ]
 */
function verify_uploadFile($name){

	if ($_FILES[$name]['error'] === UPLOAD_ERR_NO_FILE) {
	  // no file attached to <input[file]> tag
	  echo "File not found on server"; echo "<br>";
	  return UploadFileCode::FileNotFound;
	}  

	if ( ($_FILES[$name]['error'] !== UPLOAD_ERR_OK) ) {
	  echo "File uploaded failed"; echo "<br>";
	  echo "Debug: _File array"; echo "<br>";
	  var_dump($_FILES[$name]);
	  return UploadFileCode::FileUploadFailed;
	}

	// In case, file is uploaded successful
	if (!in_array($_FILES[$name]['type'], supported_image_types)) {
	  echo "File is an invalid image"; echo "<br>";
	  echo "Debug: _File array"; echo "<br>";
	  var_dump($_FILES[$name]);
	  return UploadFileCode::InValidImage;

	} else{
		// echo "File is an valid image"; echo "<br>"
		return UploadFileCode::ValidImage;

	}

	
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

   /**
   * Format price field in multidimension table from (000 000.000) to (000000.000)
   * to display on product table for user
   * table: product table need to be formated
   * field: name of field refer to product price
   * Consider move to javascript part
   */
  
  function format_price_in_table(&$table = array(),$field){

    array_walk_recursive($table, function (&$value,$key) use ($field) {
    		if ($key == $field){
    			// $value = number_format($value,3,".",' ');
    			$value = number_format(floatval($value),3,".",' '); // test 
    		} 	
        });
  }
  /**
   * [format_price_form2dataBase
   * 	format of price in form " 1 000 000.000"
   * 	datatype of product price on mysql : decimal(*,3)
   * ]
   * @param  [type] $price [description]
   * @return [type]        [description]
   */
  function format_price_form2dataBase($price){
  	return str_replace(" ", "", $price);
  }

//---- Example GET URL  ----//
// echo '<pre>';

// $url = full_url(); // full version

// var_dump(parse_url($url)); // URL sturcture: scheme://username:password@domain:port/path?query_string#fragment_id 
// print_r($url); echo '</pre>'; exit();
//---- URL ----//

/**
 * Get origin URL 
 * @param  [type]  $s                  [$_SERVER global in PHP]
 * @param  boolean $use_forwarded_host [description]
 * @return [type]                      [description]
 */
function url_origin( $s, $use_forwarded_host = false )
{
    $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
    $sp       = strtolower( $s['SERVER_PROTOCOL'] );
    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
    $port     = $s['SERVER_PORT'];
    $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
    $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
    $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

/**
 * Get  URL full version
 * @param  boolean $use_forwarded_host [description]
 * @return [type]                      [description]
 */
function full_url(  $use_forwarded_host = false )
{	 

    return url_origin( $_SERVER, $use_forwarded_host ) . $_SERVER['REQUEST_URI'];
// // $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // short version Prior to 5.4.7 this would show the path as "//www.example.com/path"
}

/**
 * This redirect doesn't incorporate the 303 status code:
 * @param  [type]  $url       [description]
 * @param  boolean $permanent [description]
 * @return [type]             [description]
 */
function redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

/**
 * [getTimeStamp get current timestamp]
 * @return [type] [description]
 */
function getTimeStamp()
{
	$timestamp = new Datetime();
	$timestamp->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh'));
	return $timestamp->format('Y-m-d H:i:s');	
}