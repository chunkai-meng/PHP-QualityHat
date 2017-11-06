<?php require_once 'Views/Shared/Breadcrumb.php'; ?>

<!-- <p>
    <a href="index.php?content_page=Order&action=Create" class="btn btn-primary">Create New</a>
</p> -->
<table class="table table-striped">
  <thead>
        <tr>
          <th>
            ID
          </th>
          <th>
            Name
          </th>
          <th>
            Address1
          </th>
          <th>
            Phone
          </th>
          <th>
            Price
          </th>
          <th>
            GST
          </th>
          <th>
            Total Price
          </th>
        </tr>
  </thead>
  <tbody>
<?php
while ($row = $models->fetch_assoc())
{
  $ID = $row["ID"];
  $Firstname = $row["Firstname"];
  $Lastname = $row["Lastname"];
  $Address1 = $row["Address1"];
  $Address2 = $row["Address2"];
  $City = $row["City"];
  $State = $row["State"];
  $Country = $row["Country"];
  $PostalCode = $row["PostalCode"];
  $Phone = $row["Phone"];
  $GST = $row["GST"];
  $Price = $row["Price"];
  $Total = $row["Total"];
  $UserID = $row["UserID"];
  $ModifiedTimestamp = $row["ModifiedTimestamp"];

echo "
    <tr>
        <td>
            $ID
        </td>
        <td>
            $Firstname &nbsp $Lastname
        </td>
        <td>
            $Address1
        </td>
        <td>
            $Phone
        </td>
        <td>
            $Price
        </td>
        <td>
            $GST
        </td>
        <td>
            $Total
        </td>
    </tr>
";
}
?>
  </tbody>
</table>
