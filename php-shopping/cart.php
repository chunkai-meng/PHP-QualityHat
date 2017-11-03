<?php
ob_start(); //set buffer on
session_start(); //starting session

// Include functions
require_once("php-shopping/business_layer/business.inc.php");
// Process actions for this page
Business::processActions();
?>

<div id="shoppingcart">
	<h2>Your Shopping Cart</h2>
	<?php
	echo Business::writeShoppingCart();
	?>
</div>

<div id="contents">
	<h2>Please check quantities...</h2>
	<?php
	echo Business::showCart();
	?>
	<p><a href="index.php?content_page=php-shopping/index">Back to bookshop...</a></p>
</div>
