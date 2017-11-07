<?php
ob_start(); //set buffer on
session_start(); //starting session

// Include business layer
require_once("php-shopping/business_layer/business.inc.php");
?>
<!DOCTYPE>



<body>
  <div id="shoppingcart">

  <h2>Your Shopping Cart</h2>

    <?php
    echo Business::writeShoppingCart();
    ?>

    </div>

    <div id="booklist">

    <h2>Books In Our Store</h2>

    <?php
    echo Business::displayBooks();
    ?>

  </div>
</body>
