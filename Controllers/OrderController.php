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
      // collect POST values
        $this->model->UserID = $_SESSION['current_userid'];
        $this->model->GST = $_POST['GST'];
        $this->model->Price = $_POST['price'];
        $this->model->Total = $_POST['totalprice'];
        $this->Firstname = "";
        $this->Lastname = "";
        $this->Address1 = "";
        $this->Address2 = "";
        $this->City = "";
        $this->State = "";
        $this->Country = "";
        $this->PostalCode = "";
        $this->Phone = "";

        echo "<br>User:" . $this->model->UserID . "<br>GST:" . $this->model->GST . "<br>";
        echo "Price:".$this->model->Price."<br>";
        echo "Total:".$this->model->Total."<br>";

        // Create an Order
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
            $item->UnitPrice = 0;
            $item->Quantity = $value;
            $item->OrderID = $orderID;
            $item->create();
          }
        }


        // update items' orderID
    }

}
