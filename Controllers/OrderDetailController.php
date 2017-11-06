<?php
class OrderDetailController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index(){
        $models = $this->model->get_all();
        require_once 'Views/OrderDetail/Index.php';
    }

}
