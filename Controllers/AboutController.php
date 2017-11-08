<?php
class AboutController
{
    private $model;

    public function __construct($model) {
      $this->model = $model;
    }

    public function index(){
      require_once 'Views/About/Contact.php';
    }
}
