<?php
class SupplierController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index(){
        $models = $this->model->get_all();
        require_once 'Views/Supplier/Index.php';
    }

    public function Create_GET() {
        require_once 'Views/Supplier/Create.php';
    }

    public function Create_POST() {
        require_once 'Views/Supplier/Create.php';
        $this->model->Name = $_POST['name'];
        $this->model->Description = $_POST['desc'];
        $this->model->create();
        echo "<script>location.href='index.php?content_page=Supplier';</script>";
    }
}
