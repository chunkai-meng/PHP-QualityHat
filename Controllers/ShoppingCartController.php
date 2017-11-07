<?php
class ShoppingCartController
{
    private $model;

    public function __construct($model) {
      $this->model = $model;
    }

    public function add_GET(){
      if (isset($_SESSION['cart']))
        $cart = $_SESSION['cart'];
      if (isset($cart) && $cart!='')
        $cart .= ','.$_GET['id'];
      else
        $cart = $_GET['id'];

      $_SESSION['cart'] = $cart;
      header("Location: ". 'index.php?content_page=Shop');
    }

    public function decrease_GET(){
      if (isset($_SESSION['cart']))
        $cart = $_SESSION['cart'];
      if ($cart) {
        $items = explode(',',$cart);
        $newcart = '';
        $index = count($items);
        $isfound = false;
        while($index){
          $index --;
          if($items[$index] != $_GET['id'] || $isfound){
            if (count($items) == 1){
              $newcart = $items[$index];
            }elseif($newcart == ''){
              $newcart = $items[$index];
            }else{
              $newcart = $items[$index] . ',' .$newcart;
            }
          } else {
            $isfound = true;
          }
        }
        $cart = $newcart;
      }
      echo "What?".$cart;
      $_SESSION['cart'] = $cart;
      header("Location: ". 'index.php?content_page=Shop');
    }

    public function delete_GET(){
      if (isset($_SESSION['cart']))
        $cart = $_SESSION['cart'];
      if (isset($_GET['action']))
        $action = $_GET['action'];
      if ($cart) {
        $items = explode(',',$cart);
        $newcart = '';
        foreach ($items as $item) {
          if ($_GET['id'] != $item) {
            if ($newcart != '') {
              $newcart .= ','.$item;
            } else {
              $newcart = $item;
            }
          }
        }
        $cart = $newcart;
      }
      $_SESSION['cart'] = $cart;
      header("Location: ". 'index.php?content_page=Shop');
    }

    public function empty_GET(){
      unset($_SESSION['cart']);
      header("Location: ". 'index.php?content_page=Shop');
    }

    public function update_GET(){
      if (isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $newcart = '';
        foreach ($_POST as $key=>$value) {
          if (stristr($key,'qty')) {
            $id = str_replace('qty','',$key);
            $items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
            $newcart = '';
            foreach ($items as $item) {
              if ($id != $item) {
                if ($newcart != '') {
                  $newcart .= ','.$item;
                } else {
                  $newcart = $item;
                }
              }
            }
            for ($i=1;$i<=$value;$i++) {
              if ($newcart != '') {
                $newcart .= ','.$id;
              } else {
                $newcart = $id;
              }
            }
          }
        }
      }
      $cart = $newcart;
      $_SESSION['cart'] = $cart;
      header("Location: ". 'index.php?content_page=Shop');
    }

    public static function countShoppingCart() {
    	if (isset($_SESSION['cart']))
    	{
    	$cart = $_SESSION['cart'];
    	}

    	if (!isset($cart) || $cart=='') {
    		return '<p>You have no items in your shopping cart</p>';
    	} else {
    		// Parse the cart session variable
    		$items = explode(',',$cart);
    		$qty = count($items);
    		return $qty;
    	}
    }

    public static function showCart() {
      include 'db_connection.php';
      $db=$mysqli;

      if (isset($_SESSION['cart']) && $_SESSION['cart'] != "")
    	{
    	  $cart = $_SESSION['cart'];
        $items = explode(',',$cart);
        $contents = array();
        $total = 0;
        foreach ($items as $item) {
          $contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
        }
        // $_SESSION['cart']="";
        require_once 'Views/Components/Default.php';
      } else {
        echo "<p>You shopping cart is empty.</p>";
      }
    }
}
