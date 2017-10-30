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

    public function create() {
      if (isset($_FILES["image_file"]) && ($_FILES["image_file"]["error"] > 0))
        {
        echo "Error: " . $_FILES["image_ file"]["error"] . "<br />";
        }
      elseif (isset($_FILES["image_file"]))
        {
          move_uploaded_file($_FILES["image_file"]["tmp_name"], "images/hats/" . $_FILES["image_file"]["name"]); //Save the file as the supplied name
          echo "Upload successfully!!!";
        }

      // create connection
      $mysqli = new mysqli("localhost", "mengc06", "05011981", "mengc06mysql3");
      if ($mysqli->connect_errno) {
          echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }
      //echo $mysqli->host_info . "\n";

      // create SQL statement
      // $sql = "INSERT INTO Employees(FirstName,LastName,Title)
      $sql = "INSERT INTO Hats(SupplierID, CategoryID, Name, Description, Price, Image) VALUES($this->SupplierID, $this->CategoryID, '$this->Name', '$this->Description', $this->Price, '$this->Image')";
      
      // execute SQL statement and get results
      if (!$mysqli->query($sql)) {
          echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
    }
}
