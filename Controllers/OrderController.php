<?php
class OrderController
{
    private $model;

    public function __construct($model) {
      require_once 'Views/Shared/CheckLogin.php';
      $this->model = $model;
    }

    public function index(){
        $models = $this->model->get_all();
        require_once 'Views/Order/Index.php';
    }

    public function Create_GET() {
      $categoryModel = new categoryModel();
      $categoryModels = $categoryModel->get_all();
      $supplierModel = new supplierModel();
      $supplierModels = $supplierModel->get_all();
      require_once 'Views/Order/Create.php';
    }

    public function Create_POST() {
      // collect user info from DB
      $this->model->UserID = $_SESSION['current_userid'];
      $user = new MemberModel();
      $user->getuserinfo($this->model->UserID);

      // collect POST values
        $this->model->Status = 'Submitted';
        $this->model->GST = $_POST['GST'];
        $this->model->Price = $_POST['price'];
        $this->model->Total = $_POST['totalprice'];
        $this->model->Firstname = $user->CustomerName;
        $this->model->Lastname = "";
        $this->model->Address1 = $user->Address;
        $this->model->Address2 = "";
        $this->model->City = "";
        $this->model->State = "";
        $this->model->Country = "";
        $this->model->PostalCode = "";
        $this->model->Phone = $user->PhoneNumber;

        $orderID = $this->model->create();

        // Create Items;
        $item = new OrderDetailModel();
        foreach ($_POST as $key=>$value) {
          if (stristr($key,'qty')) {
            $id = str_replace('qty','',$key);
            $qty = $value;
            echo "<br>ID:$id<br>QTY: $qty<br>";

            // init an item
            $item->HatID = $id;
            $item->Quantity = $value;
            $item->OrderID = $orderID;
            $item->UnitPrice = 0;
            $item->create();
          }
        }


        // update items' orderID
    }

}
