<?php
/**
 * Admin Configuration
 */

// Path of Directory
define('VERSION',"1.0.0.0_a");
define('ADMIN_PATH',PROJECT_PATH."admin/");
define('HTTP_SERVER',"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

// Define language of text 
abstract class language
{
    const vietnamese = 0;
    const english = 1;

}

abstract class privilege
{
	const no_actived = 0; // no action
	const demonstration = 1; // can not edit and delete
    const administrator = 2; // Full action and allow to access database
}

// Link define 
define('page_link',["Home" => "index.php","Products" => "product.php"]);

//  Optional of error mode
define('ERRMODE', ["debug" => 1,"release" => 0]);

// Message of successfull login
define('LOGIN_SUCCESS_MESSAGE', "Login successful");
define('LOGIN_FAILED_MESSAGE', "Login failed");
define('DELETE_CONFIRM_MESSAGE', "Are you sure to delete product?");
define('DELETE_TOOLTIP_MESSAGE', "Delete product");
define('EDIT_TOOLTIP_MESSAGE', "Edit product");
define('SAVE_TOOLTIP_MESSAGE', "Save Change");
define('DETAILS_TOOLTIP_MESSAGE', "Show Product Details ");
define('INSERT_TOOLTIP_MESSAGE', "Insert New Product");

//  product widget viewed for use (support for english and vietnamese)
define('wg_product_title', [language::english => "Insert Product", language::vietnamese => "Them San Pham"]);
define('wg_product_tag_general', [language::english => "General", language::vietnamese => "Tong Quat"]);
define('wg_product_tag_specification', [language::english => "Specification", language::vietnamese => "Thong So Cu The"]);
define('wg_product_tag_info', [language::english => "Info", language::vietnamese => "Thong Tin"]);

//  label of element of product widget viewed for use (support for english and vietnamese)
define('wg_product_name', ["Product Name","Ten San Pham"]);
define('wg_product_model', ["Model","Loai"]);
define('wg_product_quantity', ["Quantity","So Luong"]);
define('wg_product_image', [language::english => "Image", language::vietnamese => "Hinh Anh"]);
define('wg_product_manufacturer', ["Manufacturer","Nha San Xuat"]);
define('wg_product_price', ["Price","Gia"]);
define('wg_product_description', [language::english => "Description", language::vietnamese => "Mo Ta"]);
define('wg_product_available_date',[language::english => "Available Date", language::vietnamese => "Ngay Mo Ban"] );
define('wg_product_related', "Related Product");
define('wg_product_category', "Category");

// column name of product talbe viewed for user
define('tb_product_model_column', "Model");
define('tb_product_name_column', "Product Name");
define('tb_product_image_column', "Image");
define('tb_product_price_column', "Price");
define('tb_product_quantity_column', "Quanity");
define('tb_product_manufacturer_column', "Manufacturer");
define('tb_product_action_column', "Actions");

// column name of product talbe viewed for user
define('tb_manufacturer_name_column', "Manufacturer Name");
define('tb_manufacturer_image_column', "Image");
define('tb_manufacturer_action_column', "Actions");

//  manufacturer widget viewed for use
define('wg_manufacturer_tags',["general","seo"] ); 
define('wg_manufacturer_tag_name',[wg_manufacturer_tags[0] => "General",wg_manufacturer_tags[1] => "Seo"] );

//  label of elements of manufacturer widget viewed for use
define('wg_manufacturer_name', "Manufaceturer Name");
define('wg_manufacturer_image', "Image");