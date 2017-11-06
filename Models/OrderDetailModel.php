<?php
class OrderDetailModel
{

    public function get_all()
    {

      include 'db_connection.php';
      $sql="SELECT * FROM OrderDetails, Hats WHERE OrderDetails.HatID = Hats.ID";

        // select * FROM table1,table2
        //     where table1.id = table2.id
        //     and table1.id = 101;
        //

      $rs=$mysqli->query($sql);
      if (!$rs)
        {exit("Error in SQL");}

      // inject hat info into item records
      // while ($row = $rs->fetch_assoc())
      // {
      //   $hatID = $row["HatID"];
      //   // echo "<br>Hat ID: ". $hatID;
      //   $hat = new HatModel();
      //   $hat->get($hatID);
      //   echo $row[0];
      //   // echo "<br>Hat's Name: $hat->Name";
      // }

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
