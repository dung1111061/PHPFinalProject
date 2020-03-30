<?php
class category extends Table
{
  protected static $tablename = "category";

  /**
   * Category data is formated parent/child/child.
   * id | parent_id
   * 1  | NULL  => 1
   * 2  | 1     => 1 > 2
   * 3  | 2     => 1 > 2 > 3
   * 4  | 2     => 1 > 2 > 4
   * 5  |       => 5
   * @return [type] [description]
   */
  static function getFormatTable(){
  	$table = self::getAll();
  	$backup_table = $table;
  	foreach ($table as &$record) {
  		// Recursive to found multiple level path of category. Break if parent is NULL 
  		$parent_id = $record[db_category_parent_id];
  	
  		while(1){
  			$index =  array_search($parent_id, array_column($backup_table, db_category_id));
  			if ($index === FALSE )  break 1;
  			$parent_record =  $backup_table[$index];
			$record[db_category_name] = $parent_record[db_category_name]." >> ".$record[db_category_name] ;
			$parent_id = $parent_record[db_category_parent_id];
  		}
	
  	}
  	unset($record);
  	return $table;
  }

  static function find($id){
  	return self::find1record(array(db_category_id => $id));
  }

  /**
   * [getParentCategoryTable table contains only highest level catefory filter by parent_id is NULL]
   * @return [type] [description]
   */
    static function getParentCategoryTable(){
  	$table = self::getAll();
  	$filter_field = db_category_parent_id;
  	$filterBy = NULL;
  	$filtered_table =  array_filter($table, function ($record) use ($filter_field,$filterBy) {
    	return ($record[$filter_field] === $filterBy);
		});
    return $filtered_table;
  }

  /**
   * [getChildCategories all categories inside this category]
   * $id: this category
   * @return [type] [description]
   */
  static function getChildCategories($id){
    $table = self::getAll();
    $filter_field = db_category_parent_id; $filterBy = $id;
    $filtered_table = array_filter($table, function ($record) use ($filter_field,$filterBy) {
      return ($record[$filter_field] == $filterBy);
    });

    $category_ids = array_column($filtered_table, db_category_id);
    return $category_ids;
  }

  static function edit($id) {

    // get data from form 
    $arr=array(); 
      $arr[db_category_name] = $_POST['name'];
      $arr[db_category_parent_id] = $_POST['parent'] ? $_POST['parent'] : NULL;

    // 
    $stm = self::update(array(db_category_id => $id),$arr);
    echo "<pre>";
    print_r($stm->errorInfo());

  }

  static function insert($arr=array()){

    // get data from form 
    // arr with key is field in product table and correspond value is in product table .
    // add pair (key,value) to import them to database
    $arr=array(); 
      $arr[db_category_name] = $_POST['name'];
      $arr[db_category_parent_id] = $_POST['parent'] ? $_POST['parent'] : NULL;
      

    // Build SQL command
    return parent::insert($arr);

  }
}