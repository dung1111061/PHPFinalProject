<?php
// Entity class
class product extends Table
{
  public static $tablename = "product";
  
  function find($id)
  {
    return self::find1record(array(db_product_id => $id));
  }

  function edit($id) {

    // get data from form 
    $arr=array(); 
      $arr[db_product_model] = $_POST['model'];
      // 1/7/2020 Fix bug: insert product without select manufacturer.
      $arr[db_product_manufacturer_id] = $_POST['manufacturer'] ? $_POST['manufacturer'] : NULL;
      // $arr[db_product_manufacturer_id] = $_POST['manufacturer'];
      $arr[db_product_name] = $_POST['name'];
      $arr[db_product_available_date] = $_POST['available_date'];
      $arr[db_product_description] = $_POST['description'];

      // 
      if (verify_image("img") === 1){ // Image not reupload.
        $arr[db_product_image] = self::find($id)[db_product_image]; //reupdate old data

      } else {
        // delete old image on server
        $filename = PRODUCT_IMAGE_PATH.'/'.self::find($id)[db_product_image];
        delete_image($filename);

        // generate image for database
        $arr[db_product_image] = time().'_'.$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], PRODUCT_IMAGE_PATH.'/'.$arr[db_product_image]); // move file from temperary forder to project     

      }

    // 
    $stm = self::update(array(db_product_id => $id),$arr);
    echo "<pre>";
    print_r($stm->errorInfo());

  }

  function insert(){

    // get data from form 
    // arr with key is field in product table and correspond value is in product table .
    // add pair (key,value) to import them to database
    $arr=array(); 
      $arr[db_product_model] = $_POST['model'];

      // 1/7/2020 Fix bug: insert product without select manufacturer.
      $arr[db_product_manufacturer_id] = $_POST['manufacturer'] ? $_POST['manufacturer'] : NULL;
      // $arr[db_product_manufacturer_id] = $_POST['manufacturer'];

      $arr[db_product_name] = $_POST['name'];
      $arr[db_product_available_date] = $_POST['available_date'];
      $arr[db_product_description] = $_POST['description'];

      // 
      if (verify_image("img") === 1){ // Image not choosen.
        $arr[db_product_image] = NULL;

      } else {
        $arr[db_product_image] = time().'_'.$_FILES['img']['name']; // generate image for database
        move_uploaded_file($_FILES['img']['tmp_name'], PRODUCT_IMAGE_PATH.'/'.$arr[db_product_image]);  // move file from temperary forder to project       
      }

    // Build SQL command
    return parent::insert($arr);

  }

  /**
   * [delete description]
   * @param  [type] $id [product id]
   * @return [type]     [description]
   */
  function delete($id){
    //
    $filename = PRODUCT_IMAGE_PATH.'/'.self::find($id)[db_product_image];

    //
    parent::delete(array(db_product_id => $id));

    //
    delete_image($filename);

  }

}