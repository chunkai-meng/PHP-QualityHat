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
    // public function index(){
    //
    //     $models = $this->model->getData(3,1);
    //     $this->model->_limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 3;
    //     $this->model->_page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    //     $this->model->_links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    //     // $query      = "SELECT ID, Name, Description
    //     //                 FROM hats";
    //     $results    = $this->getData($this->_limit, $this->_page);
    //     require_once 'Views/Shop/Index.php';
    // }

    public function category_GET(){
        $models = $this->model->get_by_category($_GET['ID']);
        require_once 'Views/Shop/Index.php';
    }

}
