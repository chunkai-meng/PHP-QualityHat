<?php
class MemberController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index(){
        $models = $this->model->get_all();
        require_once 'Views/Member/Index.php';
    }

    public function Create_GET() {
        require_once 'Views/Member/Create.php';
    }

    public function Enable_GET() {
        $ID = $_GET['ID'];
        $this->model->enable($ID);
        echo "<script>location.href='index.php?content_page=Member';</script>";
    }

    public function Disable_GET() {
        $ID = $_GET['ID'];
        $this->model->disable($ID);
        echo "<script>location.href='index.php?content_page=Member';</script>";
    }

    public function Create_POST() {
        require_once 'Views/Member/Create.php';
        $this->model->Name = $_POST['Email'];
        $this->model->Email = $_POST['Email'];
        $this->model->PasswordHash = password_hash($_POST['Password'], PASSWORD_DEFAULT);
        $this->model->CustomerName = $_POST['Name'];
        $this->model->create();
        // echo "<script>location.href='index.php?content_page=Member';</script>";
    }
}
