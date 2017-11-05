<?php
class OrderController
{
    private $model;

    public function __construct($model) {
      require_once 'Views/Shared/CheckLogin.php';
      $this->model = $model;
    }

    public function index(){
        $models = $this->model->get_all();
        require_once 'Views/Order/Index.php';
    }

    public function Create_GET() {
      $categoryModel = new categoryModel();
      $categoryModels = $categoryModel->get_all();
      $supplierModel = new supplierModel();
      $supplierModels = $supplierModel->get_all();
      require_once 'Views/Order/Create.php';
    }

    public function Create_POST() {
      // collect POST values
        $this->model->UserID = $_SESSION['current_userid'];
        $this->model->GST = $_POST['GST'];
        $this->model->Price = $_POST['price'];
        $this->model->Total = $_POST['totalprice'];

        $this->Firstname = "";
        $this->Lastname = "";
        $this->Address1 = "";
        $this->Address2 = "";
        $this->City = "";
        $this->State = "";
        $this->Country = "";
        $this->PostalCode = "";
        $this->Phone = "";

        echo "<br>User:" . $this->model->UserID . "<br>GST:" . $this->model->GST . "<br>";
        echo "Price:".$this->model->Price."<br>";
        echo "Total:".$this->model->Total."<br>";

        // Create an Order
        $this->model->create();

        foreach ($_POST as $key=>$value) {
          if (stristr($key,'qty')) {
            $id = str_replace('qty','',$key);
            $qty = $value;
            echo "<br>ID:$id<br>QTY: $qty<br>";

          }
        }
        // if (isset($_FILES["file"]) && ($_FILES["file"]["error"] > 0))
        // {
        //   echo "Error: " . $_FILES["file"]["error"] . "<br />";
        // }
        // elseif (isset($_FILES["file"]))
        // {
        //   $name = $_FILES['file']['name'];
        //   $target_dir = "images/hats/";
        //   $target_file = $target_dir . basename($_FILES["file"]["name"]);
        //   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //   $extensions_arr = array("jpg","jpeg","png","gif");
        //   if( in_array($imageFileType,$extensions_arr) ){
        //     $new_image_name = date('Y-m-d-H-i-s') . '_' . uniqid() . "." . $imageFileType;
        //     move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $new_image_name);
        //     $this->model->Image = $new_image_name;
        //   }
        // }
        //
        // $this->model->create();
        // echo "<script>location.href='index.php?content_page=Order';</script>";
    }

}
