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
        $this->model->Image = $_FILES["image_file"]["name"];
        $this->model->create();
        echo "<script>location.href='index.php?content_page=Hat';</script>";
    }
}
