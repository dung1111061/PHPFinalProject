<?php

include COMPONENT_PATH."PHPmailer/PHPMailer-master/src/PHPMailer.php";

include COMPONENT_PATH."PHPmailer/PHPMailer-master/src/Exception.php";

include COMPONENT_PATH."PHPmailer/PHPMailer-master/src/OAuth.php";

include COMPONENT_PATH."PHPmailer/PHPMailer-master/src/POP3.php";

include COMPONENT_PATH."PHPmailer/PHPMailer-master/src/SMTP.php";

 

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;



function formatString2URL($url){

	

	$url = vn_to_str($url);

				

	$url = preg_replace('/[\W_ ]/', '-', $url); // thay kí tự đặc biệt bằng -



	$url = preg_replace('/--+/', '-', $url); 



	$url = str_replace(" ", "-", $url);



	$url = strtolower($url);



	return $url;

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

// send an html mail 

function send_html_mail($email_destination,$message) {

	if(isPHPmailer){

		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

		try {

		    //Server settings

		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output

		    $mail->isSMTP();                                      // Set mailer to use SMTP

		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers

		    $mail->SMTPAuth = true;                               // Enable SMTP authentication

		    $mail->Username = ADMIN_MAIL;                 // SMTP username

		    $mail->Password = ADMIN_MAIL_APP_PASSWORD;                           // SMTP password

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

function getTimeStamp($format='Y-m-d H:i:s')

{

	$timestamp = new Datetime();

	$timestamp->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh'));

	return $timestamp->format($format);	

}



/**

 * 

 */

function limit_words($string, $word_limit)

{

    $words = explode(" ",$string);

    return implode(" ", array_splice($words, 0, $word_limit));

}



/**

 * [ExportFile description]

 * @param [type] $records [description]

 */

function ExportFile($records) {

	$heading = false;

		if(!empty($records))

		  foreach($records as $row) {

			if(!$heading) {

			  // display field/column names as a first row

			  echo implode("\t", array_keys($row)) . "\n";

			  $heading = true;

			}

			echo implode("\t", array_values($row)) . "\n";

		  }

		return;

}



/**

 * 

 */

function vn_to_str ($str)

	{

		$unicode = array(

		 

		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

		 

		'd'=>'đ',

		 

		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

		 

		'i'=>'í|ì|ỉ|ĩ|ị',

		 

		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

		 

		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

		 

		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

		 

		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

		 

		'D'=>'Đ',

		 

		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

		 

		'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

		 

		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

		 

		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

		 

		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

		 

		);

		 

		foreach($unicode as $nonUnicode=>$uni){

			$str = preg_replace("/($uni)/i", $nonUnicode, $str);

		}

	 

		return $str;

	}