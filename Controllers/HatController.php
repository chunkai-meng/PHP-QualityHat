<?php
class HatController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function __index(){
        
    }

    public function Create() {
        $this->model->string = "Updated Data, thanks to MVC and PHP!";
    }
}
