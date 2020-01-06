<?php
// Entity class
class product
{

  static function getAll()
  {
    $conn = DB::getInstance();   
    $product_sql = "SELECT * FROM product";

    $p_stm = $conn->query($product_sql);

    $p_data = $p_stm->fetchAll(PDO::FETCH_ASSOC);
    return $p_data;
  }
  
  static function find($name)
  {
    $conn = DB::getInstance(); 
    // Build SQL command to query record
    $sql = "SELECT * FROM product WHERE ".db_product_name." = ?";
    $stm = $conn->prepare($sql);
    if(!$stm->execute(array($name)) ) die("SQL failed: $sql");
    return $stm->fetch();
  }

  static function edit($origin_name) {
    $conn = DB::getInstance(); 

    $arr=array(); 
    $arr[db_product_model] = $_POST['model'];
    $arr[db_product_manufacturer_id] = $_POST['manufacturer'];
    $arr[db_product_name] = $_POST['name'];
    $arr[db_product_available_date] = $_POST['available_date'];
    $arr[db_product_description] = $_POST['description'];

    if ( !($_FILES['img']['error'] == 0 or  $_FILES['img']['error'] == 4) ) die($_FILES['img']['error']);

    if (! in_array($_FILES['img']['type'], supported_file_type_array)) 
    {
    ?>
      <script>
        alert('File hinh sai... ');
        // window.history.back();
      </script>
    <?php
        
    }
    $arr[db_product_image] = time().'_'.$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], PRODUCT_IMAGE_PATH.'/'.$arr[db_product_image]);

    // Build SQL command
    $parameter_arr = implode(array_map(function($a, $b) { return $a . ' = ' . $b; }, array_keys($arr), array_fill(0, count($arr), '?')),',');
    $sql = "UPDATE `product` SET $parameter_arr WHERE `product_name` = '".$origin_name."'";

    echo $sql;
    print_r(array_values($arr));

    // execute SQL command
    $stm = $conn->prepare($sql);
    if(!$stm->execute(array_values($arr)) ) echo "SQL failed";

  }

  static function insert()
  {
    $conn = DB::getInstance();

    // arr with key is field in product table and correspond value is in product table .
    // add pair (key,value) to import them to database
    $arr=array(); 
    $arr[db_product_model] = $_POST['model'];
    $arr[db_product_manufacturer_id] = $_POST['manufacturer'];
    $arr[db_product_name] = $_POST['name'];
    $arr[db_product_available_date] = $_POST['available_date'];
    $arr[db_product_description] = $_POST['description'];

    if ($_FILES['img']['tmp_name']) {
      if ( !($_FILES['img']['error'] == 0 or  $_FILES['img']['error'] == 4) ) die($_FILES['img']['error']);

      if (in_array($_FILES['img']['type'], supported_file_type_array)) 
      {
        $arr[db_product_image] = time().'_'.$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], PRODUCT_IMAGE_PATH.'/'.$arr[db_product_image]); 
      } else {
        exit();
      }

    }
    

    // Build SQL command
    $sql = "INSERT INTO `product` (".implode(array_keys($arr),',').") VALUES (".implode(',', array_fill(0, count($arr), '?')).");";
    echo $sql;
    print_r(array_values($arr));

    // execute SQL command
    $stm = $conn->prepare($sql);
    if(!$stm->execute(array_values($arr)) ) echo "SQL failed";
  }

  static function delete($name)
  {
    $conn = DB::getInstance();
    $sql = "DELETE FROM product WHERE ".db_product_name." = ?";
    $stm = $conn->prepare($sql);
    $stm->execute(array($name));
    if (!$stm) {
      echo $sql;
      echo $name;
      echo '<pre>';
      echo "delete failed";
    }

  }

}