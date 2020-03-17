
<?php
// layout page
// Load layout, boostrap, fontawesome, text fonts, ace style, jquery
// meta tag 
abstract class BaseController
{
  // layouts Option
  public $page_location  = "Home"; // Home icon

  // Folder contains every specific part of page (view, css, javascript)
  public $folder; 
  
  // Javascript file user-defined handle some behaviour on client side
  public $script_file; // ".js"

  // Css file user-defined decorate page. 
  public $css_file; // ".css"

  // Content of page
  public $view_file;

  // 
  function setScript($script_file) {
    $this->script_file= 'views/' . $this->folder . '/'. $script_file . '.js';
  }

  //
  function setCss($css_file){
    $this->css_file= 'views/' . $this->folder . '/'. $css_file . '.css';
  }

  /**
   * [render a view, auto loading css and script if they are exist]
   * @param  array  $data [description]
   * @return [type]       [description]
   */
  function render($data = array())
  {
    // Kiểm tra file gọi đến có tồn tại hay không?
    $this->view_file = 'views/' . $this->folder . '/' . $this->view_file . '.php';

    if (is_file($this->view_file)) {
      // Nếu tồn tại file đó thì tạo ra các biến chứa giá trị truyền vào lúc gọi hàm
      extract($data);
      // Sau đó lưu giá trị trả về khi chạy file view template với các dữ liệu đó vào 1 biến chứ chưa hiển thị luôn ra trình duyệt
      
      // content of page, setting and breadcrumbs part is optional, using script file to decoration
      ob_start();
      require_once($this->view_file);
      $content = ob_get_clean();

      // 
      if(is_file($this->script_file)) {
        ob_start();
        require_once($this->script_file);
        $script = ob_get_clean();        
      }

      // 
      if(is_file($this->css_file)) {
        ob_start();
        require_once($this->css_file);
        $css = ob_get_clean();        
      }

      // Sau khi có kết quả đã được lưu vào biến $content, gọi ra template chung của hệ thống đế hiển thị ra cho người dùng
      $name = $_SESSION['name'];
      $avatar = AVATAR_IMAGE_PATH.admin::simple_fetch(db_admin_username,$_SESSION['username'])[db_admin_avatar];
      require_once('views/layouts/layout_main.php');

    } else {
      // Nếu file muốn gọi ra không tồn tại thì chuyển hướng đến trang báo lỗi.
      // header('Location: index.php?controller=pages&action=error');
      echo "File $this->view_file not found: ";
    }
  }
}