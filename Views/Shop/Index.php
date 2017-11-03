<div class='container marketing'>
    <div class='row'>
<?php
// $i = 0;
while ($row = $models->fetch_assoc())
{
    $id = $row['id'];
    $image = $row['image'];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $category = $row['category_ID'];
    $supplier = $row['supplier_ID'];
    echo "
    <div class='card'>
    <span class='border border-light'>
      <img class='card-img-top' src='images/hats/$image' alt='Card image cap' height='242' width='200'>
      <div class='card-body'>
        <h4 class='card-title'>$name</h4>
        <p class='card-text'>$description</p>
      </div>
      <div class='card-footer'>
        <div class='row'>
          <div class='col-xs-6 col-md-8'><h4>$$price</h4></div>
          <div class='col-xs-6 col-md-4' align='right'>

            <a href='index.php?content_page=ShoppingCart&action=add&id=$id' class='btn btn-primary'>+</a>
          </div>
        </div>
      </div>
    </span>
    </div>";
}
?>
    </div>
  </div>
<hr />
<div id="shoppingcart">
  <h2>Your Shopping Cart</h2>
  <?php
  // echo ShoppingCartController::writeShoppingCart();
  ?>
</div>
<hr />

<div id="contents">
	<h2>Please check quantities...</h2>
	<?php
	echo ShoppingCartController::showCart();
	?>
	<p><a href="index.php?content_page=php-shopping/index">Back to bookshop...</a></p>
</div>
