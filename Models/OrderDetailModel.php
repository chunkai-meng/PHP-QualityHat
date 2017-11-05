<?php
class OrderDetailModel
{
    public $ID;
    public $HatID;
    public $UnitPrice;
    public $Quantity;
    public $OrderID;
    public $ModifiedTimestamp;
    public function __construct(){
    // public function __construct($HatID, $UnitPrice, $Quantity, $OrderID){
      // $this->$HatID = $HatID;
      // $this->$UnitPrice= $UnitPrice;
      // $this->$Quantity = $Quantity;
      // $this->$OrderID = $OrderID;
    }

    public function get_all()
    {
      $sql="SELECT OrderDetails.ID As id,
                    OrderDetails.HatID As name,
                    OrderDetails.UnitPrice As lastname,
                    OrderDetails.Quantity As addr1,
                    OrderDetails.OrderID As addr2
            FROM Orders";

      include 'db_connection.php';
      $rs=$mysqli->query($sql);
      if (!$rs)
        {exit("Error in SQL");}
      return $rs;
    }

    public function create() {
      include 'db_connection.php';
      if ($mysqli->connect_errno) {
          echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }
      $userid = $_SESSION['current_userid'];
      $sql = "INSERT INTO OrderDetails (HatID, UnitPrice, Quantity, OrderID) VALUES($this->HatID, $this->UnitPrice, $this->Quantity, $this->OrderID)";
      if (!$mysqli->query($sql)) {
          echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
    }
}
