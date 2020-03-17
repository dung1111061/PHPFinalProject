<?php
/**
 * Common configuration
 */
error_reporting(E_ALL);
// error_reporting(E_ERROR | E_PARSE);

// Time Zone
define('TIME_ZONE',"Asia/Ho_Chi_Minh");

// Server 
define('SERVER_MAIL', "dung1111061@gmail.com");
  
// authencation of database
define('servername', "localhost"); //
define('username', "root");
define('password', "");
define('dbname', "quanlibanhang_offical");

// timestamp columns
define('db_created_at', "created_at");
define('db_updated_at', "updated_at");

// field in "admin" table in database
define('db_admin_email', "email");
define('db_admin_username', "username");
define('db_admin_firstname', "first_name");
define('db_admin_realname', "real_name");
define('db_admin_password', "password");
define('db_admin_privilege', "privilege");
define('db_admin_avatar', "avatar");

// field in "product" table in database
define('db_product_discount', "percentage_discount");
define('db_product_new', "new_flag");
define('db_product_id', "product_id");
define('db_product_model', "model");
define('db_product_name', "product_name");
define('db_product_price', "price");
define('db_product_quantity', "quantity");
define('db_product_available_date', "date_available");
define('db_product_image', "image");
define('db_product_manufacturer',"manufacturer_id");
define('db_product_description',"description");
define('db_product_category',"category_id");
define('db_product_rank',"rank");
define('db_product_top_selling',"top_selling_flag");
define('db_product_weight',"weight");
define('db_product_height',"height");
define('db_product_length',"length");
define('db_product_width',"width");
define('db_product_hot_deal',"hot_deal");

// field in "manufacturer" table in database
define('db_manufacturer_name',"name");
define('db_manufacturer_id',"manufacturer_id");
define('db_manufacturer_image',"image");

// field in "conversation" table in database
define('db_conversation_id', "id");
define('db_conversation_username', "user");
define('db_conversation_bodymsg', "bodymsg");
define('db_conversation_time', "time");

// field in "description" table in database
define('db_description_id', "id");

// field in "category" table in database
define('db_category_name', "name");
define('db_category_id', "id");
define('db_category_parent_id', "parent_id");

// field in "relatedproduct" table in database
define('db_relatedproduct_product_id', "product_id");
define('db_relatedproduct_related_id', "related_id");

// field in "review" table in database
define('db_review_id', "review_id");
define('db_review_name', "name");
define('db_review_email', "email");
define('db_review_description', "description");
define('db_review_product', "product_id");
define('db_review_status', "status");
define('db_review_rating', "rating");

// File type supported as image
define('supported_image_types', array("image/png","image/jpeg"));


// Path of directory
define('PROJECT_PATH','../');
define('SYSTEM_PATH',PROJECT_PATH."system/");
define('IMAGE_PATH',PROJECT_PATH."images/");
define('PRODUCT_IMAGE_PATH',IMAGE_PATH."product/");
define('PRODUCT_DETAILS_IMAGE_PATH',PRODUCT_IMAGE_PATH."details/");
define('MANUFACTURER_IMAGE_PATH',IMAGE_PATH."manufacturer/");
define('AVATAR_IMAGE_PATH',IMAGE_PATH."avatar/");

//
/**
 * Application designed exception for 
 * Exception designed for mySQL query error
 */
class MySQLQueryException extends Exception
{
    
}

/**
 * Application designed exception for 
 * Exception designed for route is not matched
 */
class RouteException extends Exception
{
    
}



