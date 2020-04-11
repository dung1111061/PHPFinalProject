<?php

class Model_New extends Table {
  protected static $tablename = "new";
  protected static $timestamp = TRUE;
  private static $formImageParameter = "img"; 
  
  /**
   *
   * return record about customer regitered before, no data if authenticate failed 
   */
  static public function find( $id ) {
    $condition = [
        db_new_id => $id
    ]; 

    return self::find1record( $condition );
  } 

  static public function createNew(){
    // get data from form of product widget  
    $data=array(); 
    self::getDataArray($data);
    //
    self::controlImageUploaded2DataArray($data,$id);

    //
    return self::insert( $data );
  }
  static public function edit($id){
    $condition = [
      db_new_id =>$id,
    ];

    // get data from form of product widget  
    $data=array(); 
    self::getDataArray($data);
    
    //
    self::controlImageUploaded2DataArray($data,$id);

    // echo "<pre>";print_r($data); exit();
    return self::update( $condition,$data );
  }

#===========================================
  static protected function getDataArray(&$arr) {
    
    if ( isset($_POST['title']) )          
      $arr[db_new_title] = $_POST['title'];
    
    if ( isset($_POST['title']) )          
      $arr[db_new_author] = $_POST['author'];

    if ( isset($_POST['category']) )
      $arr[db_new_category] = $_POST['category'] ? $_POST['category'] : NULL;
    
    if ( isset($_POST['summary']) )           
      $arr[db_new_summary] = $_POST['summary'];
    
    if ( isset($_POST['hot_deal']) )
      $arr[db_new_hot] = $_POST['hot_deal'] ? 1 : 0;
    
    //
    if ( isset($_POST['content']) )    
      $arr[db_new_content] = $_POST['content'];

  }
#===========================================
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
    $oldfilename = $id ? self::find($id)[db_new_image] : "";

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
      
      $arr[db_new_image] = time().'_'.$fileName; // Add timestamp

      // move file from temperary forder to project 
      $fileLocation = $_FILES[$fileKye]['tmp_name'];
      move_uploaded_file($fileLocation, NEW_IMAGE_PATH.$arr[db_new_image]);     
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
    if ($oldfilename) delete_image(NEW_IMAGE_PATH.$oldfilename); // except case has no old file to avoid any rick.

    // image uploaded 
    if( $uploadStatus === UploadFileCode::ValidImage) {
      
      $arr[db_new_image] = time().'_'.$fileName; // Add timestamp

      //
      $fileLocation = $_FILES[$fileKye]['tmp_name'];
      move_uploaded_file($fileLocation, NEW_IMAGE_PATH.$arr[db_new_image]);  

    }  

    if ( $uploadStatus === UploadFileCode::FileNotFound) { 
        // case upload to null meaning just click event on image product, no drop image in to area
        $arr[db_new_image] = NULL;
    }

    if ( $uploadStatus === UploadFileCode::InValidImage) { 
      //
      $arr[db_new_image] = NULL;
    }

    if ( $uploadStatus === UploadFileCode::FileUploadFailed) { 
      //;
      $arr[db_new_image] = NULL;
    } 
  }

}