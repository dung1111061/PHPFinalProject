<?php

/**
 * Admin Configuration
 */
//

// Path of Directory
define('VERSION',"1.0.0.0_a");
define('ADMIN_PATH',PROJECT_PATH."admin/");
define('BASE_URL',"http://localhost/Project/EcomerceWebsite/admin/");

// Language of web 
abstract class language
{
    const vietnamese = 0;
    const english = 1;

}

// privilege level
abstract class privilege
{
	const no_actived = 0; // no action
	const demonstration = 1; // can not edit and delete
    const administrator = 2; // Full action and allow to access database
}

/**
 * Upload file status code for itself application
 */
abstract class UploadFileCode
{
	const FileNotFound = 0; //no image attached to parameter "file" on request
	const FileUploadFailed = 1;
	const InValidImage   = 2;
	const ValidImage   = 3;
}
