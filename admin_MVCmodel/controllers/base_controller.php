
<?php
// virtual class == layout page
class BaseController
{
  // layouts Option
  public $page_path ; // Path of page
  public $search_bar ; // Search bar option

  // Indicate folder to seach view page
  public $folder; 
  // Indicate folder to seach script for view page
  public $script_file;
  // Indicate  view page
  public $view_file;

  // Import view to layout.
  // $file: content page
  // $data: data used for $file page
  function script($script_file) {
    $this->script_file= 'assets/page_js/'. $script_file . '.js';;
  }

  function render($data = array())
  {
    // Kiểm tra file gọi đến có tồn tại hay không?
    $this->view_file = 'views/' . $this->folder . '/' . $this->view_file . '.php';

    if (is_file($this->view_file)) {
      // Nếu tồn tại file đó thì tạo ra các biến chứa giá trị truyền vào lúc gọi hàm
      extract($data);
      // Sau đó lưu giá trị trả về khi chạy file view template với các dữ liệu đó vào 1 biến chứ chưa hiển thị luôn ra trình duyệt
      

      ob_start();
      require_once($this->view_file);
      $content = ob_get_clean();

      // top menu of layout
      $page_path  = $this->page_path;
      $search_bar = $this->search_bar;
      ob_start();
      include_once "views/layouts/breadcrump.php"; 
      if ($search_bar) include_once "views/layouts/searching_nav.php";
      $top_menu = ob_get_clean();

      if(is_file($this->script_file)) {
        ob_start();
        require_once($this->script_file);
        $script = ob_get_clean();        
      }

      // Sau khi có kết quả đã được lưu vào biến $content, gọi ra template chung của hệ thống đế hiển thị ra cho người dùng
      require_once('views/layouts/layout_main.php');
    } else {
      // Nếu file muốn gọi ra không tồn tại thì chuyển hướng đến trang báo lỗi.
      // header('Location: index.php?controller=pages&action=error');
      echo "File $this->view_file not found: ";
    }
  }
}