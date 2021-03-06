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

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    public function Create_POST() {
      $email = $this->test_input($_POST["Email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format: $email";
        $error =  $emailErr;
        require_once 'Views/Member/Create.php';
        exit;
      }

      $this->model->Username = $_POST['Email'];
      $this->model->Email = $_POST['Email'];
      $this->model->EmailHash = md5( rand(0,1000) );
      $this->model->Address = $_POST['Address'];
      $this->model->PhoneNumber = $_POST['PhoneNumber'];
      $this->model->PasswordHash = password_hash($_POST['Password'], PASSWORD_DEFAULT);
      $this->model->CustomerName = $_POST['Name'];
      $current_user_id = $this->model->getuserid($this->model->Username);

      if(isset($current_user_id) && $current_user_id != 0){
        $error =  $this->model->Username." already exist, please choose another email.";
        require_once 'Views/Member/Create.php';
        exit;
      } else {
        $this->model->create();
        $this->send_verification_email();
        require_once 'Views/Member/Verification.php';
      }
    }

    public function send_verification_email() {
      $servername = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
      $to      = $this->model->Email; // Send email to our user
      $subject = 'Signup | Verification'; // Give the email a subject
      $message = '

      Thanks for signing up!
      Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

      ------------------------
      Username: '.$this->model->CustomerName.'
      ------------------------

      Please click this link to activate your account:

      '. $servername .'&action=Verification&email='.$this->model->Email.'&hash='.$this->model->EmailHash.'

      '; // Our message above including the link

      $headers = 'From: webmaster@QualityHats.com' . "\r\n" .
          'Reply-To: hustmck@163.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
      // echo $message;
      // echo "<BR>$to";
      // exit;
      mail($to, $subject, $message, $headers); // Send our email
    }

    public function Verification_GET() {
      $username = $_GET['email'];
      $emailhash = $_GET['hash'];
      $result = $this->model->get_email_hash($username);
      if ($emailhash == $result) {
        echo  " <div class='alert alert-success' role='alert'>
                  $username Verification Succesfully done!
                </div>
              ";
        $this->model->verified($username);
      } else{
        echo "Get: $emailhash But Result: $result not the same!";
      }
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
      echo "<script>location.href='index.php?content_page=Shop';</script>";
    }
}
