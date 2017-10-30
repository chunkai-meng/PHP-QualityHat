<?php
class HatController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index(){
        require_once 'Views/Hat/index.php';
    }

    public function Create_GET() {
        require_once 'Views/Hat/Create.php';
    }

    public function Create_POST() {
        require_once 'Views/Hat/Create.php';

        $this->model->Name = $_POST['name'];
        $this->model->Description = $_POST['desc'];
        $this->model->Price = $_POST['price'];
        $this->model->CategoryID = $_POST['category'];
        $this->model->SupplierID = $_POST['supplier'];
        $this->model->Image = $_FILES["image_file"]["name"];
        $this->model->create();
    }
}
