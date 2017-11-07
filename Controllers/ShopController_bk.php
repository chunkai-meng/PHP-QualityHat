<?php
class ShopController_bk
{
    private $_conn;
    private $_limit;
    private $_page;
    private $_query;
    private $_total;
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index(){
        $models = $this->model->get_all();
        require_once 'Views/Shop/Index.php';
    }

    public function category_GET(){
        $models = $this->model->get_by_category($_GET['ID']);
        require_once 'Views/Shop/Index.php';
    }

}
