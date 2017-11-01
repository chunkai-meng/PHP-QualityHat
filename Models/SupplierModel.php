<?php
class SupplierModel
{
  public $Name;
  public $Description;
  
    // public function __construct(){
    // }

    public function get_all()
    {
      //Select the file information
      include 'db_connection.php';
      $sql="SELECT Categories.Name As name,
                    Categories.Description As description
            FROM Categories";

      $rs=$mysqli->query($sql);
      if (!$rs)
        {exit("Error in SQL");}
      return $rs;
    }

    public function create() {
      // create connection
      include 'db_connection.php';
      if ($mysqli->connect_errno) {
          echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }
      //echo $mysqli->host_info . "\n";

      // create SQL statement
      // $sql = "INSERT INTO Employees(FirstName,LastName,Title)
      // $sql = "INSERT INTO Hats(SupplierID, CategoryID, Name, Description, Price, Image) VALUES($this->SupplierID, $this->CategoryID, '$this->Name', '$this->Description', $this->Price, '$this->Image')";
      $sql = "INSERT INTO Categories (Name, Description) VALUES ('$this->Name', '$this->Description')";
      // execute SQL statement and get results
      if (!$mysqli->query($sql)) {
          echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
    }
}
