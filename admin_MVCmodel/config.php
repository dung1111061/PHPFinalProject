<?php

// Define language of text 
abstract class language
{
    const vietnamese = 0;
    const english = 1;

}

// authencation of database
define(servername, "localhost");
define(username, "root");
define(password, "");
define(dbname, "quanlibanhang_offical");

// File type supported
define(supported_file_type_array, array("image/png","image/jpeg"));

// Link define 
define(page_array,["Home" => "dashboard.php","Products" => "product.php"]);

//  Optional of error mode
define(ERRMODE, ["debug" => 1,"release" => 0]);

// Message of successfull login
define(LOGIN_SUCCESS_MESSAGE, "Login successful");
define(DELETE_CONFIRM_MESSAGE, "Are you sure to delete product?");
define(DELETE_TOOLTIP_MESSAGE, "Delete product");
define(EDIT_TOOLTIP_MESSAGE, "Edit product");
define(SAVE_TOOLTIP_MESSAGE, "Save Change");
define(DETAILS_TOOLTIP_MESSAGE, "Show Product Details ");
define(INSERT_TOOLTIP_MESSAGE, "Insert New Product");
// Path of product image directory
define(PRODUCT_IMAGE_PATH,".\assets\catalog\product");

// field in product table in database
define(db_product_model, "model");
define(db_product_name, "product_name");
define(db_product_price, "price");
define(db_product_quantity, "quantity");
define(db_product_added_date, "date_added");
define(db_product_available_date, "date_available");
define(db_product_image, "image");
define(db_product_manufacturer_id,"manufacturer_id");
define(db_product_description,"description");
define(db_manufacturer_name,"name");


//  product widget viewed for use (support for english and vietnamese)
define(wg_product_title, [language::english => "Insert Product", language::vietnamese => "Them San Pham"]);
define(wg_product_tag_general, [language::english => "General", language::vietnamese => "Tong Quat"]);
define(wg_product_tag_specification, [language::english => "Specification", language::vietnamese => "Thong So Cu The"]);
define(wg_product_tag_info, [language::english => "Info", language::vietnamese => "Thong Tin"]);

// form element label of product widget viewed for use (support for english and vietnamese)
define(wg_product_name, ["Product Name","Ten San Pham"]);
define(wg_product_model, ["Model","Loai"]);
define(wg_product_quantity, ["Quantity","So Luong"]);
define(wg_product_image, [language::english => "Image", language::vietnamese => "Hinh Anh"]);
define(wg_product_manufacturer, ["Manufacturer","Nha San Xuat"]);
define(wg_product_price, ["Price","Gia"]);
define(wg_product_description, [language::english => "Description", language::vietnamese => "Mo Ta"]);
define(wg_product_available_date,[language::english => "Available Date", language::vietnamese => "Ngay Mo Ban"] );


// column name of product talbe viewed for user
define(tb_product_model_column, "Model");
define(tb_product_name_column, "Product Name");
define(tb_product_image_column, "Image");
define(tb_product_price_column, "Price");
define(tb_product_quantity_column, "Quanity");
define(tb_product_manufacturer_column, "Manufacturer");
define(tb_product_action_column, "Actions");


