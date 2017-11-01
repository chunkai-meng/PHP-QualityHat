<?php
class SupplierController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index(){
        $models = $this->model->get_all();
        require_once 'Views/Category/Index.php';
    }

    public function Create_GET() {
        require_once 'Views/Category/Create.php';
    }

    public function Create_POST() {
        require_once 'Views/Category/Create.php';
        $this->model->Name = $_POST['name'];
        $this->model->Description = $_POST['desc'];
        $this->model->create();
    }
}
