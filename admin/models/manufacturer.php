<?php
class Manufacturer extends Table
{
  protected static $tablename = "manufacturer";
  private static $formImageParameter = "img"; 

  static function find($id)
  {
    return self::find1record(array(db_manufacturer_id => $id));
  }

  static function insert($arr=array()){
      
      $arr[db_manufacturer_name] = $_POST['name'];

      self::controlImageUploaded2DataArray($arr);

      // // 
      // if (verify_uploadFile("img") === 1){ // Image not choosen.
      //   $arr[db_manufacturer_image] = NULL;

      // } else {
      //   $arr[db_manufacturer_image] = time().'_'.$_FILES['img']['name']; // generate image for database
      //   move_uploaded_file($_FILES['img']['tmp_name'], MANUFACTURER_IMAGE_PATH.'/'.$arr[db_manufacturer_image]);  // move file from temperary forder to project       
      // }

    // Build SQL command
    parent::insert($arr);
  }
  
  static function delete($id){
    //
    parent::delete(array(db_manufacturer_id => $id));
    
  }

  static function edit($id) {

    // get data from form 
    $arr=array(); 

      $arr[db_manufacturer_name] = $_POST['name'];

      self::controlImageUploaded2DataArray($arr);

      // // 
      // if (verify_uploadFile("img") === 1){ // Image not reupload.
      //   $arr[db_manufacturer_image] = self::find($id)[db_manufacturer_image]; //reupdate old data

      // } else {
      //   // delete old image on server
      //   $filename = MANUFACTURER_IMAGE_PATH.self::find($id)[db_manufacturer_image];
      //   delete_image($filename);

      //   // generate image for database
      //   $arr[db_manufacturer_image] = time().'_'.$_FILES['img']['name'];
      //   move_uploaded_file($_FILES['img']['tmp_name'], MANUFACTURER_IMAGE_PATH.'/'.$arr[db_manufacturer_image]); // move file from temperary forder to project     

      // }

    // 
    $stm = self::update(array(db_manufacturer_id => $id),$arr);
    echo "<pre>";
    print_r($stm->errorInfo());

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
    $oldfilename = $id ? self::find($id)[db_manufacturer_image] : "";

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
      
      $arr[db_manufacturer_image] = time().'_'.$fileName; // Add timestamp

      // move file from temperary forder to project 
      $fileLocation = $_FILES[$fileKye]['tmp_name'];
      move_uploaded_file($fileLocation, MANUFACTURER_IMAGE_PATH.$arr[db_manufacturer_image]);     
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
    if ($oldfilename) delete_image(MANUFACTURER_IMAGE_PATH.$oldfilename); // except case has no old file to avoid any rick.

    // image uploaded 
    if( $uploadStatus === UploadFileCode::ValidImage) {
      
      $arr[db_manufacturer_image] = time().'_'.$fileName; // Add timestamp

      //
      $fileLocation = $_FILES[$fileKye]['tmp_name'];
      move_uploaded_file($fileLocation, MANUFACTURER_IMAGE_PATH.$arr[db_manufacturer_image]);  

    }  

    if ( $uploadStatus === UploadFileCode::FileNotFound) { 
        // case upload to null meaning just click event on image product, no drop image in to area
        $arr[db_manufacturer_image] = NULL;
    }

    if ( $uploadStatus === UploadFileCode::InValidImage) { 
      //
      $arr[db_manufacturer_image] = NULL;
    }

    if ( $uploadStatus === UploadFileCode::FileUploadFailed) { 
      //;
      $arr[db_manufacturer_image] = NULL;
    } 
  }

}