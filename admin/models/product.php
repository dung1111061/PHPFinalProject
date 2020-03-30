<?php
// Product Table
// Define method to query product table
class product extends Table implements ProductInterface
{
  protected static $tablename = "product";
  protected static $timestamp = TRUE;
  private static $formImageParameter = "img"; 

  // private _construct(){}

  /**
   * [getDataArray Fetch data in form of product widget via method POST to imported database for case audit and insert case.]
    Note: Validate data on server side to match database (not implement yet)
    Change history:
      2020/03/06 fields is not send consider as default value if used form for insert case, as no changed if used form for audit case.
   * @param  [type] &$arr [description]
   * @return [type]       [description]
   */
  static protected function getDataArray(&$arr) {
    
    if ( isset($_POST['model']) )          
      $arr[db_product_model] = $_POST['model'];
    
    // 1/7/2020 Fix bug: insert product without select manufacturer.
    if ( isset($_POST['manufacturer']) )
      $arr[db_product_manufacturer] = $_POST['manufacturer'] ? $_POST['manufacturer'] : NULL;
    
    if ( isset($_POST['category']) )
      $arr[db_product_category] = $_POST['category'] ? $_POST['category'] : NULL;
    
    if ( isset($_POST['name']) )           
      $arr[db_product_name] = $_POST['name'];
    
    if ( isset($_POST['available_date']) ) 
      $arr[db_product_available_date] = $_POST['available_date'];
    
    if ( isset($_POST['description']) )    
      $arr[db_product_description] = $_POST['description'];

    if ( isset($_POST['quantity']) )    
      $arr[db_product_quantity] = $_POST['quantity'];
    
    // 
    if ( isset($_POST['price']) )          
      $arr[db_product_price] = format_price_form2dataBase($_POST['price']);
    
    // "top_selling" only be sent as switch to on or not     
    // value of flag on database is "tinyint"  
    if ( isset($_POST['top_selling']) ) 
      $arr[db_product_top_selling] = $_POST['top_selling'] ? 1 : 0;
    
    // "new_product" only be sent as switch to on or not     
    // value of flag on database is "tinyint"
    if ( isset($_POST['new_product']) )
      $arr[db_product_new] = $_POST['new_product'] ? 1 : 0;

    //
    if ( isset($_POST['hot_deal']) )
      $arr[db_product_hot_deal] = $_POST['hot_deal'] ? 1 : 0;
    
    if ( isset($_POST['discount']) )       
      $arr[db_product_discount] = $_POST['discount'];

    //
    if ( isset($_POST['weight']) ) 
      $arr[db_product_weight] = $_POST['weight'];

    //
    if ( isset($_POST['length']) ) 
      $arr[db_product_length] = $_POST['length'];

    //
    if ( isset($_POST['height']) ) 
      $arr[db_product_height] = $_POST['height'];

    //
    if ( isset($_POST['width']) ) 
      $arr[db_product_width] = $_POST['width'];

    // size
    // if ( isset($_POST['size']) ){
    //   $size_regex = "/(.*) x (.*) x (.*)/";
    //   preg_match($size_regex, $_POST['size'], $result);
    //   // preg_match($size_regex, "12 x 34 x 23", $result);
    //   if($result){
    //     [$size_plholder, $length, $width, $height] = $result;
    //     $arr[db_product_height] = $height;
    //     $arr[db_product_length] = $length;
    //     $arr[db_product_width] = $width;
    //   } else {
    //     $arr[db_product_height] = "";
    //     $arr[db_product_length] = "";
    //     $arr[db_product_width] = "";
    //   }

    // }

    // echo "<pre>";print_r($arr);exit();
  }

//============================================
  static function find($id)
  {
    return self::find1record(array(db_product_id => $id));
  }

  /**
   * [audit product from form]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  static function edit($id) {

    // get data from form of product widget  
    $arr=array(); 
    self::getDataArray($arr);
    //
    self::controlImageUploaded2DataArray($arr,$id);
    

    // Execute SQL command 
    return self::update(array(db_product_id => $id),$arr);
  }

  /**
   * [insert new product from form of product widget ]
   * $arr: pseudo parameter should not be pass by user
   * (need to be statisfy condiotion "should be compatible with parent method"
   * )
   * @return [type] [description]
   */
  static function insert($arr=array()){

    // get data from form
    // arr with key is field in product table and correspond value is in product table.
    // add pair (key,value) to import them to database
    self::getDataArray($arr);
    // 
    self::controlImageUploaded2DataArray($arr);

    // Execute SQL command
    return parent::insert($arr);

  }

  /**
   * [delete product]
   * @param  [type] $id [product id]
   * @return [type]     [description]
   */
  static function delete($id){
    //
    $stm = parent::delete(array(db_product_id => $id));

    return $stm;

  }

//============================================
  /**
   * Get all product available  to sale
   * @return [type]              [description]
   */
  static function getAllAvailable(){

      $product = self::getAll();
      // check available condition;
  
      return $product;
  }
  /**
   * [Get all new product available  to sale]
   * @return [type] [description]
   */
  static function getAvaiNewProduct(){
      $product_table = self::getAllAvailable();

      // filter new
      $filterBy = 1;
      $new_table = array_filter($product_table, function ($record) use ($filterBy){
          return ($record[db_product_new] == $filterBy);
      });
      return $new_table;
  }

  static function getAvaiTopProduct(){
      $product_table = self::getAllAvailable();

      // filter top selling
      $filterBy = 1;
      return array_filter($product_table, function ($record) use ($filterBy){
          return ($record[db_product_top_selling] == $filterBy);
      });
  }
 
//============================================
  /**
   * get all available product same category
   * @param  [type] $category_id [description]
   * @return [type]              [description]
   */
  static function filterCategory($category_id,$product_table){

      // filter category
      $category_ids = category::getChildCategories($category_id);
      array_push($category_ids, $category_id);
      $filterBy = $category_ids;

      return array_filter($product_table, function ($record) use ($filterBy){
          return ( in_array($record[db_product_category], $filterBy));
      });

  }

  static function filterPrice($min_price,$max_price,$product_table){

    return array_filter($product_table, function ($record) use ($min_price,$max_price){
          return ( $record[db_product_price] >= $min_price & $record[db_product_price] <= $max_price  );
      });
  }

  static function filterManufacturer($manufacturer_ids = array(),$product_table){
    
    $filterBy = $manufacturer_ids;
    return array_filter($product_table, function ($record) use ($filterBy){
          return ( in_array($record[db_product_manufacturer], $filterBy));
      });
  }

  static function filterHotDeal($product_table){

      // filter category
      $filterBy = 1;

      return array_filter($product_table, function ($record) use ($filterBy){
          return ( $record[db_product_hot_deal] == $filterBy );
      });
  }

  /**
   * [filterSearching Filter by searching bar on user application]
   * @param  [type] $keyword       [description]
   * @param  [type] $product_table [description]
   * @return [type]                [description]
   */
  static function filterKeyword($keyword,$product_table){

      // filter category
      $filterBy = $keyword; // demo for one keyword

      return array_filter($product_table, function ($record) use ($filterBy){
          // 3/16/2020 sua loi filter
          //
          // $pos = strpos($record[db_product_name], $filterBy);
          // return $pos;
          if (strpos($record[db_product_name], $filterBy) !== false) return 1;

      });
  }

//============================================
  /**
   * [Objective: Pass file name to data array and stored image file assets]
   * Designed used for typical image of product in widget in case upload and reupload
   * Mechanism of controlly is that file name passed in form
   *   compare with file name stored in database.  
   *  2020/03/03 
   *  
   * @param  [type] &$arr        [description]
   * @param  string $oldfilename [default "" meaning as not update image]
   * @return [type]              [description]
   */
  static function controlImageUploaded2DataArray(&$arr,$id=""){

    // image parameter has no on request
    if( !isset($_FILES[self::$formImageParameter]) ) return;

    //
    $oldfilename = $id ? self::find($id)[db_product_image] : "";

    // get status of upload file process
    if($oldfilename === ""){
      // new image uploaded
      $file = self::$formImageParameter;
      self::hanleUploadImage($arr,$file);

    } else {
      // new image reuploaded
      $file = self::$formImageParameter;
      self::hanleReuploadImage($arr,$file,$oldfilename);
    } 

  }

  // Pass file name to data array and stored image file assets, 
  // no pass if upload failed or no attach image on request
  static protected function hanleUploadImage(&$arr,$fileKye){
    //
    $uploadStatus = verify_uploadFile($fileKye);
    $fileName = $_FILES[$fileKye]['name'];

    if( $uploadStatus === UploadFileCode::ValidImage) {
      
      $arr[db_product_image] = time().'_'.$fileName; // Add timestamp

      // move file from temperary forder to project 
      $fileLocation = $_FILES[$fileKye]['tmp_name'];
      move_uploaded_file($fileLocation, PRODUCT_IMAGE_PATH.$arr[db_product_image]);     
    }  

    if ( $uploadStatus === UploadFileCode::FileNotFound) { 
      // no drop image into area
    }

    if ( $uploadStatus === UploadFileCode::InValidImage) { 
      // 
    }

    if ( $uploadStatus === UploadFileCode::FileUploadFailed) { 
      //;
    }

  }

  // Pass file name to data array and stored image file assets and delete old image, 
  // set to null if upload failed or audit image to null
  static protected function hanleReuploadImage(&$arr,$fileKye,$oldfilename) {
    //
    $uploadStatus = verify_uploadFile($fileKye);
    $fileName = $_FILES[$fileKye]['name'];

    // delete old image on server
    if ($oldfilename) delete_image(PRODUCT_IMAGE_PATH.$oldfilename); // except case has no old file to avoid any rick.

    // image uploaded 
    if( $uploadStatus === UploadFileCode::ValidImage) {
      
      $arr[db_product_image] = time().'_'.$fileName; // Add timestamp

      //
      $fileLocation = $_FILES[$fileKye]['tmp_name'];
      move_uploaded_file($fileLocation, PRODUCT_IMAGE_PATH.$arr[db_product_image]);  

    }  

    if ( $uploadStatus === UploadFileCode::FileNotFound) { 
        // case upload to null meaning just click event on image product, no drop image in to area
        $arr[db_product_image] = NULL;
    }

    if ( $uploadStatus === UploadFileCode::InValidImage) { 
      //
      $arr[db_product_image] = NULL;
    }

    if ( $uploadStatus === UploadFileCode::FileUploadFailed) { 
      //;
      $arr[db_product_image] = NULL;
    } 
  }

//=================================================================
  /**
   * [recalculatePrice calculate old and new price based on discount]
   * @param  [type] &$table [description]
   * @return [type]         [description]
   */
  static function recalculatePrice(&$table){
    // Down price dueto discount
    array_walk($table,function(&$record){
      $old_price = "";
      $discount   = $record[db_product_discount];
      if ($discount) {
        $old_price = $record[db_product_price];
        $record[db_product_price] = $old_price*(1.0 - sprintf("%.2f", $discount/100.0)); 
      }

      $record["old_price"] = $old_price;
    });    
  }

  /**
   * [formatProduct2UserApp: format price, image field for display on user application ]
   * @return [type] [description]
   */
  static function formatProduct2UserApp(&$table){
      // Format price fields before view for user
      format_price_in_table($table,"old_price");
      format_price_in_table($table,db_product_price);

      // format image field
      array_walk($table,function(&$record){
        $img   = $record[db_product_image];
        $record[db_product_image] = $img? PRODUCT_IMAGE_PATH.$img : PRODUCT_IMAGE_PATH."image_not_found.png"; 
        // test image same size
        // $record[db_product_image] = PRODUCT_IMAGE_PATH."image_not_found.png"; 
        
      });
    
  }
  /**
   * [formatProduct2Form 
   *   Format product to display on form 
   * ]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  static function formatProduct2Form(&$p_record){

    // size
    // $p_record['size'] = $p_record[db_product_length]." + ".
    //                     $p_record[db_product_width]." + ".
    //                     $p_record[db_product_height];

    // price
    format_price_in_table($p_record,db_product_price);
    
    // source for <image> tag
    if($p_record[db_product_image])
      $p_record[db_product_image] = PRODUCT_IMAGE_PATH.$p_record[db_product_image];
  }
  
}