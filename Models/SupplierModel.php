<?php
class SupplierModel
{
  public $Name;
  public $Description;

    public function get_all()
    {
      include 'db_connection.php';
      $sql="SELECT Suppliers.Name As name,
                    Suppliers.Description As description
            FROM Suppliers";

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
      $sql = "INSERT INTO Suppliers (Name, Description) VALUES ('$this->Name', '$this->Description')";
      if (!$mysqli->query($sql)) {
          echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
    }
}
