<?php require_once 'Views/Shared/Breadcrumb.php'; ?>

<!-- <p>
    <a href="index.php?content_page=Order&action=Create" class="btn btn-primary">Create New</a>
</p> -->
<table class="table table-striped">
  <thead>
        <tr>
          <th>
            Name
          </th>
          <th>
            Description
          </th>
          <th>
            Price
          </th>
          <th>
            Quantity
          </th>
          <th>
            OrderID
          </th>
        </tr>
  </thead>
  <tbody>
<?php
while ($row = $models->fetch_assoc())
{
  $ID = $row["ID"];
  $Name= $row["Name"];
  $Description= $row["Description"];
  $Price = $row['Price'];
  $Quantity = $row["Quantity"];
  $OrderID= $row["OrderID"];

echo "
    <tr>
        <td>
            $Name
        </td>
        <td>
            $Description
        </td>
        <td>
            $Price
        </td>
        <td>
            $Quantity
        </td>
        <td>
            $OrderID
        </td>
    </tr>
";
}
?>
  </tbody>
</table>
