<div class='container marketing'>
    <div class='row'>
<?php for( $i = 1; $i < count( $results->data ); $i++ ) : ?>
    <div class='card'>
    <span class='border border-light'>
      <img class='card-img-top' src='images/hats/<?php echo $results->data[$i]['Image']; ?>' alt='Card image cap' height='242' width='200'>
      <div class='card-body'>
        <h4 class='card-title'><?php echo $results->data[$i]['Name']; ?></h4>
        <p class='card-text'><?php echo $results->data[$i]['Description']; ?></p>
      </div>
      <div class='card-footer'>
        <div class='row'>
          <div class='col-xs-6 col-md-8'><h4><?php echo $results->data[$i]['Price']; ?></h4></div>
          <div class='col-xs-6 col-md-4' align='right'>
            <a href='index.php?content_page=ShoppingCart&action=add&id=$id' class='badge badge-dark'>+</a>
          </div>
        </div>
      </div>
    </span>
    </div>
<?php endfor; ?>

    </div>
  </div>

<?php echo $this->createLinks( $this->_links, 'pagination pagination-sm' ); ?>
<hr />

<h3>Shopping Cart </h3>
<?php
echo ShoppingCartController::showCart();
?>
