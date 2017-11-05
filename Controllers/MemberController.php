<?php
$status = session_status();
echo $status;
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}

class MemberController
{
    private $model;

    public function __construct($model) {
      $this->model = $model;
    }

    public function index(){
      require_once 'Views/Shared/CheckLogin.php';
      $models = $this->model->get_all();
      require_once 'Views/Member/Index.php';
    }

    public function Create_GET() {
      require_once 'Views/Shared/CheckLogin.php';
      require_once 'Views/Member/Create.php';
    }

    public function Create_POST() {
      require_once 'Views/Member/Create.php';
      $this->model->Name = $_POST['Email'];
      $this->model->Email = $_POST['Email'];
      $this->model->PasswordHash = password_hash($_POST['Password'], PASSWORD_DEFAULT);
      $this->model->CustomerName = $_POST['Name'];
      $this->model->create();
      echo "<script>location.href='index.php?content_page=Member';</script>";
    }

    public function Enable_GET() {
      require_once 'Views/Shared/CheckLogin.php';
        $ID = $_GET['ID'];
        $this->model->enable($ID);
        echo "<script>location.href='index.php?content_page=Member';</script>";
    }

    public function Disable_GET() {
      require_once 'Views/Shared/CheckLogin.php';
        $ID = $_GET['ID'];
        $this->model->disable($ID);
        echo "<script>location.href='index.php?content_page=Member';</script>";
    }

    public function Login_GET() {
      require_once 'Views/Member/Login.php';
    }

    public function Login_POST() {
      session_start(); //starting session
      // if the user has input username and password
      if (isset($_POST['Email']) and isset($_POST['Password']))
      {
        //The login is not successful, set the login flag to false
        $_SESSION['flag'] = false;

        // call the pre-defined function and check if user is authenticated
        if ( $this->model->check_passwd($_POST['Email'], $_POST['Password']) )
        {
          //The login is successful, set the login flag to true and save the current user name
          $_SESSION['flag'] = true;
          $_SESSION['current_user'] = $_POST['Email'];
          $_SESSION['current_userid'] = $this->model->getuserid($_POST['Email']);
          //redirect the user to the correct page
          //find out where to go after login
          if (isset($_SESSION['request_page']))
            $redirect_page = "index.php?content_page=".$_SESSION['request_page'];
          else
            $redirect_page = "index.php";
            //redirect the user to the correct page after login
          header("Location: ".$redirect_page);
        }
      } //Otherwise, stay in the login page
    }

    public function Logout_GET() {
      $status = session_status();
      if($status == PHP_SESSION_NONE){
          //There is no active session
          session_start();
      }
      // $request_page = $_SESSION['request_page'];
      $_SESSION['flag'] = false;
      $_SESSION['current_user'] = null;
      $_SESSION['current_userid'] = null;
      header("Location: ". "Shop");
    }
}
