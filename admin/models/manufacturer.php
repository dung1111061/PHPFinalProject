<?php
class manufacturer extends Table
{
  protected static $tablename = "manufacturer";

  function find($id)
  {
    return self::find1record(array(db_manufacturer_id => $id));
  }

  function insert($arr=array()){
     
      $arr[db_manufacturer_name] = $_POST['name'];
      // 
      if (verify_uploadFile("img") === 1){ // Image not choosen.
        $arr[db_manufacturer_image] = NULL;

      } else {
        $arr[db_manufacturer_image] = time().'_'.$_FILES['img']['name']; // generate image for database
        move_uploaded_file($_FILES['img']['tmp_name'], MANUFACTURER_IMAGE_PATH.'/'.$arr[db_manufacturer_image]);  // move file from temperary forder to project       
      }

    // Build SQL command
    parent::insert($arr);
  }
  
  function delete($id){
    //
    parent::delete(array(db_manufacturer_id => $id));
    
  }

  function edit($id) {

    // get data from form 
    $arr=array(); 

      $arr[db_manufacturer_name] = $_POST['name'];

      // 
      if (verify_uploadFile("img") === 1){ // Image not reupload.
        $arr[db_manufacturer_image] = self::find($id)[db_manufacturer_image]; //reupdate old data

      } else {
        // delete old image on server
        $filename = MANUFACTURER_IMAGE_PATH.self::find($id)[db_manufacturer_image];
        delete_image($filename);

        // generate image for database
        $arr[db_manufacturer_image] = time().'_'.$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], MANUFACTURER_IMAGE_PATH.'/'.$arr[db_manufacturer_image]); // move file from temperary forder to project     

      }

    // 
    $stm = self::update(array(db_manufacturer_id => $id),$arr);
    echo "<pre>";
    print_r($stm->errorInfo());

  }

}