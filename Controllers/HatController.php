<?php
class HatController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index(){
        $models = $this->model->get_all();
        require_once 'Views/Hat/Index.php';
    }

    public function Create_GET() {
        require_once 'Views/Hat/Create.php';
    }

    public function Create_POST() {
        $this->model->Name = $_POST['name'];
        $this->model->Description = $_POST['desc'];
        $this->model->Price = $_POST['price'];
        $this->model->CategoryID = $_POST['category'];
        $this->model->SupplierID = $_POST['supplier'];


        if (isset($_FILES["file"]) && ($_FILES["file"]["error"] > 0))
        {
          echo "Error: " . $_FILES["file"]["error"] . "<br />";
        }
        elseif (isset($_FILES["file"]))
        {
          $name = $_FILES['file']['name'];
          $target_dir = "images/hats/";
          $target_file = $target_dir . basename($_FILES["file"]["name"]);
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $extensions_arr = array("jpg","jpeg","png","gif");
          if( in_array($imageFileType,$extensions_arr) ){
            $new_image_name = date('Y-m-d-H-i-s') . '_' . uniqid() . "." . $imageFileType;
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $new_image_name);
            $this->model->Image = $new_image_name;
          }
        }

        $this->model->create();
        // echo "<script>location.href='index.php?content_page=Hat';</script>";
    }

}
