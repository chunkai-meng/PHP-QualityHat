<?php
class OrderDetailModel
{
    public function get_all()
    {
      include 'db_connection.php';
      $sql="SELECT * FROM OrderDetails, Hats WHERE OrderDetails.HatID = Hats.ID";
      $rs=$mysqli->query($sql);
      if (!$rs)
        {exit("Error in SQL");}
      return $rs;
    }

    public function get($id)
    {
      include 'db_connection.php';
      $sql="SELECT * FROM OrderDetails, Hats WHERE OrderDetails.HatID = Hats.ID AND OrderID = $id";
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
