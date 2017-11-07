<?php
require_once 'Views/Shared/CheckSession.php';

class MemberController
{
    private $model;

    public function __construct($model) {
      $this->model = $model;
    }

    public function index(){
      require_once 'Views/Shared/AuthorizeAdmin.php';
      $models = $this->model->get_all();
      require_once 'Views/Member/Index.php';
    }

    public function Create_GET() {
      require_once 'Views/Member/Create.php';
    }

    public function Create_POST() {
      $this->model->Name = $_POST['Email'];
      $this->model->Email = $_POST['Email'];
      $this->model->Address = $_POST['Address'];
      $this->model->PhoneNumber = $_POST['PhoneNumber'];
      $this->model->PasswordHash = password_hash($_POST['Password'], PASSWORD_DEFAULT);
      $this->model->CustomerName = $_POST['Name'];
      $this->model->create();
      echo "<script>location.href='index.php?content_page=Member';</script>";
    }

    public function Enable_GET() {
      require_once 'Views/Shared/AuthorizeAdmin.php';
      require_once 'Views/Shared/CheckLogin.php';
        $ID = $_GET['ID'];
        $this->model->enable($ID);
        echo "<script>location.href='index.php?content_page=Member';</script>";
    }

    public function Disable_GET() {
      require_once 'Views/Shared/AuthorizeAdmin.php';
      require_once 'Views/Shared/CheckLogin.php';
        $ID = $_GET['ID'];
        $this->model->disable($ID);
        echo "<script>location.href='index.php?content_page=Member';</script>";
    }

    public function Login_GET() {
      require_once 'Views/Member/Login.php';
    }

    public function Login_POST() {
      if (isset($_POST['Email']) and isset($_POST['Password']))
      {
        //The login is not successful, set the login flag to false
        $_SESSION['flag'] = false;
        $username = $_POST['Email'];
        $passwd = $_POST['Password'];

        // call the pre-defined function and check if user is authenticated
        if ( $this->model->check_passwd($username, $passwd) )
        {
          //The login is successful, set the login flag to true and save the current user name
          $_SESSION['flag'] = true;
          $_SESSION['current_user'] = $username;
          $_SESSION['current_userid'] = $this->model->getuserid($username);
          if (isset($_SESSION['request_page']))
            $redirect_page = "index.php?content_page=".$_SESSION['request_page'];
          else
            $redirect_page = "index.php";

          header("Location: ".$redirect_page);
        } else {
          // Login fail:
          $logdate = date("dmY");
          $myfile = fopen("Logs/$logdate.txt", "a") or die("Unable to open file!");
          $txt = date("Y-m-d h:i:s"). "\t". $username . "\t" . "logon fail\n";
          fwrite($myfile, $txt);
          fclose($myfile);
        }
      }
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
