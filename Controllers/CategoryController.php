<?php
class CategoryController
{
    private $model;

    public function __construct($model) {
      require_once 'Views/Shared/CheckLogin.php';
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
        $this->model->Name = $_POST['name'];
        $this->model->Description = $_POST['desc'];
        $this->model->create();
        echo "<script>location.href='index.php?content_page=Category';</script>";
    }
}
