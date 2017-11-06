<?php
class HatModel
{
    public $ID;
    public $CategoryID;
    public $SupplierID;
    public $Name;
    public $Description;
    public $Price;
    public $Image;
    public $string;

    public function __construct(){
        // $this->string = "MVC + PHP = Awesome!";
        // $this->HatID = "ID";
        // $this->Name = "";
        // $this->SupplierID = 1;
        // $this->CategoryID = 1;
        // $this->Description = "Hat Desc";
        // $this->Image = "Image URL";
    }

    public function get($id)
    {
      include 'db_connection.php';
      echo "<br>ID: $id<br>";
      $sql='SELECT ID, CategoryID, SupplierID, Name, Description, Price, Image FROM Hats WHERE ID='.$id;
      $rs=$mysqli->query($sql);
      if (!$rs)
        {exit("Error in SQL");}
      // $password_hash = mysqli_result($sql, 0);
      if ($rs->num_rows == 1) {
        $row = $rs->fetch_assoc();
        $this->ID = $row["ID"];
        $this->CategoryID = $row["CategoryID"];
        $this->SupplierID = $row["SupplierID"];
        $this->Name = $row["Name"];
        $this->Description = $row["Description"];
        $this->Price = $row["Price"];
        $this->Image = $row["Image"];
      } else {
          echo "User Not Found!";
      }
    }

    public function get_all()
    {
      $sql="SELECT Hats.ID As id,
                    Hats.Name As name,
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
