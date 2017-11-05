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
    }

    public function get_all()
    {
      $sql="SELECT Orders.ID As id,
                    Orders.Firstname As name,
                    Orders.Lastname As lastname,
                    Orders.Address1 As addr1,
                    Orders.Address2 As addr2,
                    Orders.City As City,
                    Orders.State As State,
                    Orders.Country As country,
                    Orders.PostalCode As postaCode,
                    Orders.Phone As phone,
                    Orders.GST As gst,
                    Orders.Price As price,
                    Orders.Total As total,
                    Orders.UserID As userid,
                    Orders.ModifiedTimestamp As modifiedtime
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

      $sql = "INSERT INTO Orders(HatID, UnitPrice, Quantity, OrderID) VALUES($this->HatID, $this->UnitPrice, '$this->Quantity', '$this->OrderID')";

      if (!$mysqli->query($sql)) {
          echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
    }
}
