<?php
/**
 * summary
 */
class product_controller extends \controller
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
        		$action = "show";

        	case "show": // show main home page
        		$this->action_implement = "main";
        		// implement action to doAction 
        		break;
            
          case "rate": 
              $this->action_implement = "rate";
              break;     

        	default:
        		$message = "product page do not support action $action";
				throw new RouteException($message);
        		break;
        }
    }

    /**
     * [main_home description]
     * @return [type] [description]
     */
    protected function main(){
        $id = $_GET["id"]; 

        $product = Product::find($id);

        //
        $image_library = array(
            PRODUCT_DETAILS_IMAGE_URL."product01.png",
            PRODUCT_DETAILS_IMAGE_URL."product03.png",
            PRODUCT_DETAILS_IMAGE_URL."product05.png",
            PRODUCT_DETAILS_IMAGE_URL."product08.png"
        );
        //
        $reviews = Review::getApprovedByProduct($_GET["id"]);

        //
        $related_ids = array_column(RelatedProduct::get($id), db_relatedproduct_related_id);
        $relatedProducts = array();
        foreach ($related_ids as $related_id) {
            $record = Product::find($related_id);
            $relatedProducts[] = $record;
        }
        Product::recalculatePrice($relatedProducts);
        Product::formatProduct2UserApp($relatedProducts);

        //
        $data = [
            'product' => $product,
            'image_library' => $image_library,
            'reviews' => $reviews,
            'relatedProducts' => $relatedProducts,
        ];

        $view = PRODUCT_PATH.'product.php';
        $script = PRODUCT_PATH.'product.js';
        //
        $this->render($view,$data,$script);    
    }

  /**
   * [rate ajax for push review]
   * @return [type] [description]
   */
  function rate(){
    $stm = Review::createNew(
        $_GET["id"],
        $_POST["name"],
        $_POST["email"],
        $_POST["description"],
        $_POST["rating"]
    );

    if($stm->errorInfo()[2]) {
      $message = "<b style='color:red'>".$stm->errorInfo()[2]."</b> <br>";
      throw new MySQLQueryException($message);
    }

    echo "1";
  }
    
}

