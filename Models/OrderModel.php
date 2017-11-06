<?php
class OrderModel
{
    public $ID;
    public $Status;
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
      include 'db_connection.php';
      $sql= "SELECT ID, Status, Firstname, Lastname, Address1, Address2, City, State, Country, PostalCode, Phone,
                    GST, Price, Total, UserID, ModifiedTimestamp
            FROM Orders";
      $rs=$mysqli->query($sql);
      if (!$rs)
        {exit("Error in SQL");}
      return $rs;
    }

    public function get($id)
    {
      include 'db_connection.php';
      $sql= "SELECT ID, Status, Firstname, Lastname, Address1, Address2, City, State, Country, PostalCode, Phone,
                    GST, Price, Total, UserID, ModifiedTimestamp
            FROM Orders WHERE UserID=$id";
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

      $sql = "INSERT INTO Orders(Status, Firstname, Lastname, Address1, Address2, City, State, Country, PostalCode, Phone, UserID, Price, GST, Total)
              VALUES('$this->Status', '$this->Firstname', '$this->Lastname', '$this->Address1', '$this->Address2', '$this->City', '$this->State',
                    '$this->Country', '$this->PostalCode', '$this->Phone', $this->UserID, $this->Price, $this->GST, $this->Total)";

      if (!$mysqli->query($sql)) {
          echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
      return $mysqli->insert_id;
    }
}
