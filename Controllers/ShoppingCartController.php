<?php
class ShoppingCartController
{
    private $model;

    public function __construct($model) {
      // $this->model = $model;
    }

    public function add_GET(){
      if (isset($_SESSION['cart']))
      {
        // echo $_SESSION['cart'] . "<br>";
        $cart = $_SESSION['cart'];
      }

      if (isset($_GET['action']))
      {
        $action = $_GET['action'];
      }

      if (isset($cart) && $cart!='') {
        $cart .= ','.$_GET['id'];
      } else {
        $cart = $_GET['id'];
      }
      $_SESSION['cart'] = $cart;
      // echo $_SESSION['cart'].$cart;
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
      // echo $_SESSION['cart'].$cart;
      header("Location: ". 'index.php?content_page=Shop');
    }

    public function update_GET(){
      if (isset($_SESSION['cart']))
        $cart = $_SESSION['cart'];

      if (isset($_GET['action']))
        $action = $_GET['action'];

      if ($cart) {
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

    public static function processActions() {
      if (isset($_SESSION['cart']))
      {
        $cart = $_SESSION['cart'];
      }

      if (isset($_GET['action']))
      {
        $action = $_GET['action'];
      }
      else
      {
        return;
      }

    switch ($action) {
      case 'add':
        if (isset($cart) && $cart!='') {
          $cart .= ','.$_GET['id'];
        } else {
          $cart = $_GET['id'];
        }
        break;
      case 'delete':
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
        break;
      case 'update':
      if ($cart) {
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
      break;
      }
      $_SESSION['cart'] = $cart;
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
    		$output[] = '<li>"'.$row['title'].'" by '.$row['author'].': &pound;'.$row['price'].'<br /><a href="index.php?content_page=ShoppingCart&action=add&id='.$row['id'].'">Add to cart</a></li>';
    	}
    	$output[] = '</ul>';
    	echo join('',$output);
    }

    public static function showCart() {
      // global $db;
      include 'db_connection.php';
      $db=$mysqli;


      $cart = $_SESSION['cart'];
      if ($cart) {
        $items = explode(',',$cart);
        $contents = array();
        $total = 0;
        foreach ($items as $item) {
          $contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
        }
        $output[] = '<form action="index.php?content_page=ShoppingCart&action=update" method="post" id="cart">';
        $output[] = '<table>';
        foreach ($contents as $id=>$qty) {
          $sql = 'SELECT * FROM books WHERE id = '.$id;
          $result = $db->query($sql);
          $row = $result->fetch_assoc();
          extract($row);
          $output[] = '<tr>';
          $output[] = '<td><a href="index.php?content_page=ShoppingCart&action=delete&id='.$id.'" class="r">Remove</a></td>';
          $output[] = '<td>'.$title.' by '.$author.'</td>';
          $output[] = '<td>&pound;'.$price.'</td>';
          $output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
          $output[] = '<td>&pound;'.($price * $qty).'</td>';

          $total += $price * $qty;

          $output[] = '</tr>';
        }
        $output[] = '</table>';
        $output[] = '<p>Grand total: <strong>&pound;'.$total.'</strong></p>';
        $output[] = '<div><button type="submit">Update cart</button></div>';
        $output[] = '</form>';
      } else {
        $output[] = '<p>You shopping cart is empty.</p>';
      }
      return join('',$output);
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
