<?php
// namespace controller;
/**
 * summary
 */
class controller
{
    /**
     * summary
     */
    protected $action_implement=""; // Point to action implement
    protected $script=""; // Point to script file

    /**
     * [loadPage execute abstract loadPage method to implement action for request, 
     * pointed by action_implement property]
     * @return [type] [description]
     */
    function loadPage(){
        ob_start(); // Navigating buffer to cache memory

    	// .pass function to callback.
    	call_user_func(array($this, "$this->action_implement")); 

        return ob_get_clean(); // release cache
    }

    // Load script for specific page, pointed by action_implement
    function loadScript(){
        ob_start(); // Navigating buffer to cache memory

    	if(is_file($this->script)) {
    		include_once $this->script;
    	}

        return ob_get_clean(); // release cache
    }

    /**
     * [generateApplication import content and script to layout 
     * and generate application on client side]
     * @param  [type] $content [description]
     * @param  [type] $script  [description]
     * @return [type]          [description]
     */
    function generateApplication($content,$script){

        // category for navigation bar 
        $category_table = category::getParentCategoryTable(); 

        // Get keyword in URL for searching field
        $keyword = $_GET["searching"];
        
        // Get category filter 
        $c_filter = $_GET["category"];

        // 
        if($c_filter)
            $searching_form_action = "index.php?controller=store&category=$c_filter&searching=";
        else
            $searching_form_action = "index.php?controller=store&searching=";

        //
        require_once LAYOUT_PATH.'layout.php';
    }
}