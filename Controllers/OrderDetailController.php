<?php
class OrderDetailController
{
    private $model;

    public function __construct($model) {
      require_once 'Views/Shared/CheckLogin.php';
        $this->model = $model;
    }

    public function index(){
        // $models = $this->model->get_all();
        $models = $this->model->get($_GET['ID']);
        require_once 'Views/OrderDetail/Index.php';
    }

}
