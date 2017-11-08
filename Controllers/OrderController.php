<?php
class OrderController
{
    private $model;

    public function __construct($model) {
      require_once 'Views/Shared/CheckLogin.php';
      $this->model = $model;
    }

    public function index(){
        if($_SESSION['current_user'] == 'admin@email.com'){
          $models = $this->model->get_all();
          require_once 'Views/Order/Admin.php';
        }
        else{
          $models = $this->model->get($_SESSION['current_userid']);
          require_once 'Views/Order/Index.php';
        }
    }

    public function change_status_POST() {
      $id = $_POST['ID'];
      $status = $_POST['Status'];
      $this->model->change_status($id, $status);
      echo "<script>location.href='index.php?content_page=Order';</script>";
    }


    public function Create_POST() {
      // collect user info from DB
      $this->model->UserID = $_SESSION['current_userid'];
      $user = new MemberModel();
      $user->getuserinfo($this->model->UserID);

      // collect POST values
      $this->model->Status = 'Submitted';
      $this->model->GST = $_POST['GST'];
      $this->model->Price = $_POST['Price'];
      $this->model->Total = $_POST['Total'];
      $this->model->Firstname = $user->CustomerName;
      $this->model->Lastname = "";
      $this->model->Address1 = $user->Address;
      $this->model->Address2 = "";
      $this->model->City = "";
      $this->model->State = "";
      $this->model->Country = "";
      $this->model->PostalCode = "";
      $this->model->Phone = $user->PhoneNumber;
      // echo $this->model->GST ;
      // exit;
      $orderID = $this->model->create();

      // Create Items;
      $item = new OrderDetailModel();
      foreach ($_POST as $key=>$value) {
        if (stristr($key,'qty')) {
          $id = str_replace('qty','',$key);
          $qty = $value;

          $item->HatID = $id;
          $item->Quantity = $value;
          $item->OrderID = $orderID;
          $item->UnitPrice = 0;
          $item->create();
          // echo $item->HatID;
          //       exit;
        }
      }

      unset($_SESSION['cart']);
      echo "<script>location.href='index.php?content_page=Order';</script>";
    }

}
