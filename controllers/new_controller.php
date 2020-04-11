<?php
/**
 * summary
 */
class new_controller extends controller
{
    /**
     * summary
     */
    
    /**
     * [__construct description]
     * @param [type] $action [description]
     */
    public function __construct($action)
    {
        switch ($action) {
          case "":
            $action = "show_sample";

          case "show_sample":
            $this->action_implement = "show_sample";
            break;
          case "contactPage":
            $this->action_implement = "show_contact";
            break;
              
                
        	default:
        		$message = " do not support action $action";
				    throw new RouteException($message);
        		break;
        }
    }


    protected function show_sample(){
      
      //
      $tindemo = Model_New::find(1);
      $tindemo[db_new_category] = $tindemo[db_new_category] ? $tindemo[db_new_category]:"Chính sách";
      
      //
      $data = [
        "title" => $tindemo[db_new_title],
        "category"=> $tindemo[db_new_category],
        "summary" => $tindemo[db_new_summary],
        "noidung"=> $tindemo[db_new_content],
        "createDay"=> $tindemo['created_at'],
        "author"=> $tindemo[db_new_author] 
      ];

      //
      $view = NEW_PATH.'sample.php';
      
      //
      $this->render($view,$data);   
    }

    protected function show_contact(){
      
      //
      $tindemo = Model_New::find(2);
      $tindemo[db_new_category] = $tindemo[db_new_category] ? $tindemo[db_new_category]:"Chính sách";
      
      //
      $data = [
        "title" => $tindemo[db_new_title],
        "category"=> $tindemo[db_new_category],
        "summary" => $tindemo[db_new_summary],
        "noidung"=> $tindemo[db_new_content],
        "createDay"=> $tindemo['created_at'],
        "author"=> $tindemo[db_new_author] 
      ];

      //
      $view = NEW_PATH.'contact.php';
      
      //
      $this->render($view,$data);   
    }

    

}