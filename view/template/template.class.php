<?php
// Used to view template
// Description:
// View must be exits, if no view will throw exception 
class Template {
  private $_templatePath=TEMPLATE_PATH;//comes from config.php
  private $properties;

  private function setTemplatePath($scriptPath){
    $this->_templatePath.=$scriptPath;
    $this->_templatePath.=".template.php";
  }

  public function __construct($view,$data=array()){
    $this->setTemplatePath($view);
    $this->properties = $data;
  }

  public function render(){
    
   if(file_exists($this->_templatePath)){
     extract($this->properties); 
     include($this->_templatePath);
     
    } else throw new Exception();

  }

}