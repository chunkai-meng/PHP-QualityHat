<?php
require_once 'Views/Shared/CheckSession.php';
echo "<div class='container marketing'>
    <div class='row'>";
for( $i = 1; $i < count( $models->data ); $i++ )
{
    $id =          $models->data[$i]['ID'];
    $image =       $models->data[$i]['Image'];
    $name =        $models->data[$i]['Name'];
    $description = $models->data[$i]['Description'];
    $price =       $models->data[$i]['Price'];
    $category =    $models->data[$i]['CategoryID'];
    $supplier =    $models->data[$i]['SupplierID'];
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
            <a href='index.php?content_page=ShoppingCart&action=add&id=$id' class='badge badge-dark'>+</a>
          </div>
        </div>
      </div>
    </span>
    </div>";
}
?>
    </div>
    <?php echo $this->createLinks( $this->_links, 'pagination pagination-sm' ); ?>

  </div>
<hr />

<h3>Shopping Cart </h3>
<?php
// $count = ShoppingCartController::countShoppingCart();
// echo "<span class='badge badge-secondary'>$count</span>";

echo ShoppingCartController::showCart();
?>
