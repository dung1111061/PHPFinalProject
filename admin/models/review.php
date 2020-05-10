<?php
/**
 * Entity Class
 * Class set constraint to relate id and product id is unique
 */
class Review extends Table
{
  protected static $tablename = "review";
  protected static $timestamp = TRUE;

  //
  static function createNew($product,$name,$email,$description,$rank){
    $data = [
      db_review_product => $product,
      db_review_name => $name,
      db_review_email => $email,
      db_review_description => $description,
      db_review_rank => $rank
    ];

    return self::insert($data);
  }

  //
  static function getPending(){
    
    $reviews = self::selectInnerJoin(db_review_product,array("*"),array(db_product_name));
    
    // 
    return array_filter($reviews, function ($record) {
        return ( ! isset( $record[db_review_status] ) );
    });
  }

//
  static function getRejected(){
    $reviews = self::selectInnerJoin(db_review_product,array("*"),array(db_product_name));
    
    //  
    $filterBy = "0";
    return array_filter($reviews, function ($record) use ($filterBy){
        return ( $record[db_review_status] === $filterBy );
    });
  }

//
  static function getApproved(){
    $reviews = self::selectInnerJoin(db_review_product,array("*"),array(db_product_name));
    
    //  
    $filterBy = "1";
    return array_filter($reviews, function ($record) use ($filterBy){
        return ( $record[db_review_status] === $filterBy );
    });
  }

  //
  static function approve($review){
    
    //
    $data = array();
    $data[db_review_status] = 1;

    // Execute SQL command     
    return self::update(array(db_review_id => $review),$data);
  }

  //
  static function reject($id){
    
    //
    $arr = array();
    $arr[db_review_status] = 0;

    // Execute SQL command     
    return self::update(array(db_review_id => $id),$arr);
  }

  static function getApprovedByProduct($product){
    $condition = [
      db_review_product => $product
    ];
    $reviews = self::findTableRecord($condition);
    
    //  
    $filterBy = 1;
    return array_filter($reviews, function ($record) use ($filterBy){
        if ( isset( $record[db_review_status] ) )
          return ( $record[db_review_status] == $filterBy );
    });
  }

  static function find($id){
    $condition = [
      db_review_id => $id
    ];
    return self::find1Record($condition);
  }
}