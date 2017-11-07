<?php
class ShopModel
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

    public function get_by_category($id)
    {
      $sql="SELECT Hats.ID As id,
                    Hats.Name As name,
                    Hats.Description As description,
                    Hats.Price As price,
                    Hats.Image As image,
                    Hats.CategoryID As category_ID,
                    Hats.SupplierID As supplier_ID
            FROM Hats WHERE CategoryID=$id";

      include 'db_connection.php';
      $rs=$mysqli->query($sql);
      if (!$rs)
        {exit("Error in SQL");}
      return $rs;
    }

}
