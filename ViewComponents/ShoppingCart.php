<form action="index.php?content_page=Order" method="post">
<input type="hidden" name="action" value="Create" />
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
foreach ($contents as $id=>$qty) {
  $sql = 'SELECT * FROM hats WHERE id = '.$id;
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  extract($row);
  $subtotal = $Price * $qty;
  echo "<tr>
          <td>$ID</td>
          <td>$Name</td>
          <td>$Description</td>
          <td>$Price</td>
          <input type='hidden' name='Price' value=$Price />
          <td><a href='index.php?content_page=ShoppingCart&action=decrease&id=$id' class='badge badge-dark'>-</a>
              <input type='text' name='qty$id' value=$qty size=3 maxlength=3 readonly />
              <a href='index.php?content_page=ShoppingCart&action=add&id=$id' class='badge badge-dark'>+</a>
          </td>
          <td>$subtotal</td>
        </tr>";
        $total += $Price * $qty;
}
$GST = $total * $gst_rate;
$totalprice = $GST + $total;
?>
</tbody>
</table>
<div align="right">
  <p>GST: <strong><?php printf("%.2f",$GST); ?><strong></p>
    <input type="hidden" name="GST" value=<?php echo $GST; ?> />
  <p>Grand total: <strong><?php printf("%.2f",$totalprice); ?><strong></p>
    <input type="hidden" name="Total" value=<?php echo $GST; ?> />
</div>
<div class="row">
  <div class="col-sm-6 col-xs-6" align="left">
    <a class="btn btn-secondary btn-sm" href="index.php?content_page=ShoppingCart&action=empty" role="button">Empty Cart</a>
  </div>
<div class="col-sm-6 col-xs-6" align="right">
  <button class="btn btn-primary btn-sm">Checkout &nbsp
    <span class="badge badge-secondary">
    <?php echo ShoppingCartController::countShoppingCart(); ?>
    <span>
  </button>
</div>
</div>
</form>
