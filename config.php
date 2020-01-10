<?php
/**
 * Common configuration
 */
// Time Zone
define('TIME_ZONE',"Asia/Ho_Chi_Minh");

// Server 
define('SERVER_MAIL', "dung1111061@gmail.com");
  
// authencation of database
define('servername', "localhost");
define('username', "root");
define('password', "");
define('dbname', "quanlibanhang_offical");

// field in "admin" table in database
define('db_admin_email', "email");
define('db_admin_username', "username");
define('db_admin_firstname', "first_name");
define('db_admin_realname', "real_name");
define('db_admin_password', "password");
define('db_admin_privilege', "privilege");
define('db_admin_avatar', "avatar");

// field in "product" table in database
define('db_product_new', "new_flag");
define('db_product_id', "product_id");
define('db_product_model', "model");
define('db_product_name', "product_name");
define('db_product_price', "price");
define('db_product_quantity', "quantity");
define('db_product_added_date', "date_added");
define('db_product_available_date', "date_available");
define('db_product_image', "image");
define('db_product_manufacturer_id',"manufacturer_id");
define('db_product_description',"description");

// field in "manufacturer" table in database
define('db_manufacturer_name',"name");
define('db_manufacturer_id',"manufacturer_id");

// field in "conversation" table in database
define('db_conversation_id', "id");
define('db_conversation_username', "user");
define('db_conversation_bodymsg', "bodymsg");
define('db_conversation_time', "time");

// field in "description" table in database
define('db_description_id', "id");

// File type supported as image
define('supported_file_type_array', array("image/png","image/jpeg"));


// Path of directory
define('PROJECT_PATH','../');
define('SYSTEM_PATH',PROJECT_PATH."system/");
define('IMAGE_PATH',PROJECT_PATH."images/");
define('PRODUCT_IMAGE_PATH',IMAGE_PATH."product/");
define('AVATAR_IMAGE_PATH',IMAGE_PATH."avatar/");