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

        $product = product::find($id);

        //
        $image_library = array(
            PRODUCT_DETAILS_IMAGE_PATH."product01.png",
            PRODUCT_DETAILS_IMAGE_PATH."product03.png",
            PRODUCT_DETAILS_IMAGE_PATH."product05.png",
            PRODUCT_DETAILS_IMAGE_PATH."product08.png"
        );
        //
        $reviews = array();

        //
        $related_ids = array_column(relatedProduct::get($id), db_relatedproduct_related_id);
        $relatedProducts = array();
        foreach ($related_ids as $related_id) {
            $record = product::find($related_id);
            $relatedProducts[] = $record;
        }
        product::recalculatePrice($relatedProducts);
        product::formatProduct2UserApp($relatedProducts);

        //
        $data = [
            'product' => $product,
            'image_library' => $image_library,
            'reviews' => $reviews,
            'relatedProducts' => $relatedProducts,
        ];

        $view = PRODUCT_PATH.'product.php';

        //
        $this->render($view,$data);    
    }
}

