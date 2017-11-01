<?php
class HatModel
{
    public $HatID;
    public $CategoryID;
    public $SupplierID;
    public $Name;
    public $Description;
    public $Price;
    public $Image;
    public $string;

    public function __construct(){
        $this->string = "MVC + PHP = Awesome!";
        $this->HatID = "ID";
        $this->Name = "";
        $this->SupplierID = 1;
        $this->CategoryID = 1;
        $this->Description = "Hat Desc";
        $this->Image = "Image URL";
    }

    public function get_all()
    {
      $sql="SELECT Hats.Name As name,
                    Hats.Description As description,
                    Hats.Price As price,
                    Hats.Image As image,
                    Hats.CategoryID As category_ID,
                    Hats.SupplierID As supplier_ID
            FROM Hats";

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

      $sql = "INSERT INTO Hats(SupplierID, CategoryID, Name, Description, Price, Image) VALUES($this->SupplierID, $this->CategoryID, '$this->Name', '$this->Description', $this->Price, '$this->Image')";

      if (!$mysqli->query($sql)) {
          echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
    }
}
