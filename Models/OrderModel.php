<?php
class OrderModel
{
    public $ID;
    public $Firstname;
    public $Lastname;
    public $Address1;
    public $Address2;
    public $City;
    public $State;
    public $Country;
    public $PostalCode;
    public $Phone;
    public $GST;
    public $Price;
    public $Total;
    public $UserID;
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

      $sql = "INSERT INTO Orders(SupplierID, CategoryID, Name, Description, Price, Image) VALUES($this->SupplierID, $this->CategoryID, '$this->Name', '$this->Description', $this->Price, '$this->Image')";

      if (!$mysqli->query($sql)) {
          echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
    }
}
