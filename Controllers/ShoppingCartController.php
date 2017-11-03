<?php
class ShoppingCartController
{
    private $model;

    public function __construct($model) {
      // $this->model = $model;
    }
    public static function writeShoppingCart() {
    	if (isset($_SESSION['cart']))
    	{
    	$cart = $_SESSION['cart'];
    	}

    	if (!isset($cart) || $cart=='') {
    		return '<p>You have no items in your shopping cart</p>';
    	} else {
    		// Parse the cart session variable
    		$items = explode(',',$cart);
    		$s = (count($items) > 1) ? 's':'';
    		return '<p>You have <a href="index.php?content_page=php-shopping/cart&action=display">'.count($items).' item'.$s.' in your shopping cart</a></p>';
    	}
    }

    public static function displayBooks() {
      include 'db_connection.php';
      $db=$mysqli;

    	$sql = "SELECT * FROM books ORDER BY id";
      $result = $db->query($sql);

    	$output[] = '<ul>';
    	while ($row = $result->fetch_assoc()) {
    		$output[] = '<li>"'.$row['title'].'" by '.$row['author'].': &pound;'.$row['price'].'<br /><a href="index.php?content_page=php-shopping/cart&action=add&id='.$row['id'].'">Add to cart</a></li>';
    	}
    	$output[] = '</ul>';
    	echo join('',$output);
    }


    // public function index(){
    //   $models = $this->model->get_all();
    //   require_once 'Views/Category/Index.php';
    // }
    //
    // public function Create_GET() {
    //     require_once 'Views/Category/Create.php';
    // }
    //
    // public function Create_POST() {
    //     $this->model->Name = $_POST['name'];
    //     $this->model->Description = $_POST['desc'];
    //     $this->model->create();
    //     echo "<script>location.href='index.php?content_page=Category';</script>";
    // }
}
