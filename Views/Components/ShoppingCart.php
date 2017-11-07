<form action="index.php?content_page=Order" method="post">
<input type='hidden' name='action' value='Create' />
<table class="table">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Name</th>
<th scope="col">Description</th>
<th scope="col">Price</th>
<th scope="col">Quantity</th>
<th scope="col">Subtotal</th>
</tr>
</thead>
<tbody>
<?php
// require 'db_connection.php';
$mysqli = new mysqli("localhost", "mengc06", "05011981", "mengc06mysql3");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

foreach ($contents as $id=>$qty) {
  // $sql = 'SELECT * FROM books WHERE id = '.$id;
  $sql = 'SELECT * FROM hats WHERE id = '.$id;
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
  extract($row);
  $subtotal = $Price * $qty;
  echo "<tr>
          <td>$ID</td>
          <td>$Name</td>
          <td>$Description</td>
          <td>$Price</td>
          <td><a href='index.php?content_page=ShoppingCart&action=decrease&id=$id' class='badge badge-dark'>-</a>
              $qty
              <input type='text' name='qty$id' value=$qty size=3 maxlength=3 hidden />
              <a href='index.php?content_page=ShoppingCart&action=add&id=$id' class='badge badge-dark'>+</a>
          </td>
          <td>$subtotal</td>
        </tr>";
        $total += $Price * $qty;
}
$GST = $total * $gst_rate;
$totalprice = $GST + $total;
$count = ShoppingCartController::countShoppingCart();
echo "
</tbody>
</table>
<input type='hidden' name='GST' value=$GST />
<input type='hidden' name='price' value=$total />
<input type='hidden' name='totalprice' value=$totalprice />
<div align='right'><p>GST: <strong>$$GST</strong></p><p>Grand total: <strong>$$totalprice</strong></p></div>
<input type='hidden' name='action' value='Create' />
<div class='row'>
<div class='col-sm-6 col-xs-6' align='left'>
<a class='btn btn-secondary btn-sm' href='index.php?content_page=ShoppingCart&action=empty' role='button'>Empty Cart</a>
</div>
<div class='col-sm-6 col-xs-6' align='right'>
<button class='btn btn-primary btn-sm'>Place Order &nbsp<span class='badge badge-secondary'>$count</span></button></form>
</div>
</div>
";
?>
