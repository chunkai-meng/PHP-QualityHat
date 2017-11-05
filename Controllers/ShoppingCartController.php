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


          //   $newcart = $items[--$index].$newcart;
          // } elseif ($index == count($items)){
          //   $newcart = $items[--$index];
          // } else {
          //   $newcart = $items[--$index].','.$newcart;
          // }
          // echo "<br>".$newcart;
        }
        // $isfound = false;
        // foreach ($items as $item) {
        //   if ($_GET['id'] != $item || $isfound) {
        //     $newcart = ($newcart != '') ? ($newcart . ',' . $item) : $item;
        //   } else {
        //     $isfound = true;
        //   }
        // }
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
        $output[] = '<form action="index.php?content_page=ShoppingCart&action=update" method="post" id="cart">';
        $output[] = '<table class="table">';
        $output[] = '<thead>';
        $output[] =  '<tr>';
        $output[] =  '<th scope="col">ID</th>';
        $output[] =  '<th scope="col">Name</th>';
        $output[] =  '<th scope="col">Description</th>';
        $output[] =  '<th scope="col">Price</th>';
        $output[] =  '<th scope="col">Quantity</th>';
        // $output[] =  '<th scope="col">Remove</th>';
        $output[] =  '<th scope="col">Subtotal</th>';
        $output[] =  '</tr>';
        $output[] =  '</thead>';
        $output[] =  '<tbody>';
        foreach ($contents as $id=>$qty) {
          // $sql = 'SELECT * FROM books WHERE id = '.$id;
          $sql = 'SELECT * FROM hats WHERE id = '.$id;
          $result = $db->query($sql);
          $row = $result->fetch_assoc();
          extract($row);
          $output[] = '<tr>';
          $output[] = '<td>'.$ID.'</td>';
          $output[] = '<td>'.$Name.'</td>';
          $output[] = '<td>'.$Description.'</td>';
          $output[] = '<td>$'.$Price.'</td>';
          $output[] = '<td><a href="index.php?content_page=ShoppingCart&action=decrease&id='.$id.'" class="badge badge-dark">-</a>
                      <input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" disabled/><a href="index.php?content_page=ShoppingCart&action=add&id='.$id.'" class="badge badge-dark">+</a></td>';
          // $output[] = '<td><a href="index.php?content_page=ShoppingCart&action=delete&id='.$id.'" class="badge badge-dark">Delete</a></td>';
          $output[] = '<td>$'.($Price * $qty).'</td>';
          $total += $Price * $qty;
          $output[] = '</tr>';
        }
        $GST = $total * $gst_rate;
        $totalprice = $GST + $total;
        $output[] = '</tbody>';
        $output[] = '</table>';
        $output[] = '<div align="right"><p>GST: <strong>$'.$GST.'</strong></p><p>Grand total: <strong>$'.$totalprice.'</strong></p></div>';
        $output[] = '<div><button type="submit">Update cart</button></div>';
        $output[] = '</form>';

        $output[] = '<div class="row">';
        $output[] = '<div class="col-sm-6 col-xs-6" align="left">';
        $output[] = '<a class="btn btn-secondary btn-sm" href="index.php?content_page=ShoppingCart&action=empty" role="button">Empty Cart</a>';
        $output[] = '</div>';
        $output[] = '<div class="col-sm-6 col-xs-6" align="right">';
        $count = ShoppingCartController::countShoppingCart();
        $output[] = '<form><button class="btn btn-primary btn-sm">Place Order &nbsp<span class="badge badge-secondary">'.$count.'</span></button></form>';
        $output[] = '</div>';
        $output[] = '</div>';

      } else {
        $output[] = '<p>You shopping cart is empty.</p>';
      }
      return join('',$output);
    }

}
