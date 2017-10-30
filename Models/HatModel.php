<?php
class HatModel
{
    public $HatID;
    public $CategoryID;
    public $Desc;
    public $Image;
    public $string;

    public function __construct(){
        $this->string = "MVC + PHP = Awesome!";
        $this->HatID = "ID";
        $this->CategoryID = "CategoryID";
        $this->Desc = "Hat Desc";
        $this->Image = "Image URL";
    }
}
