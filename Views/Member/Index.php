<?php require_once 'Views/Shared/Breadcrumb.php'; ?>

<p>
    <a href="index.php?content_page=Member&action=Create" class="btn btn-primary">Create New</a>
</p>
<table class="table table-striped">
  <thead>
          <th>
             Name
          </th>
          <th>
             Address
          </th>
          <th>
             Phone Number
          </th>
          <th>
             Customer Name
          </th>
          <th>
             Email Confirmed
          </th>
          <th>
             Enabled
          </th>
          <td>Activation</td>
        </tr>
  </thead>
  <tbody>
<?php
while ($row = $models->fetch_assoc())
{
    $id = $row["ID"];
    $name = $row["Username"];
    $email = $row["Email"];
    $phone = $row["PhoneNumber"];
    $address = $row["Address"];
    $customer_name = $row["CustomerName"];
    $enabled = $row["Enabled"];
    $email_confirmed = $row["EmailConfirmed"];

    echo "<tr>
          <td>$name</td>
          <td>$address</td>
          <td>$phone</td>
          <td>$customer_name</td>";
    if ($email_confirmed == true)
    {
      echo "<td><input type='checkbox' checked='checked' name='enabled' disabled=disabled></td>";
    }
    else
    {
      echo "<td><input type='checkbox' name='enabled' disabled=disabled></td>";
    }
    if ($enabled == true)
    {
      echo "<td><input disabled='disabled' type='checkbox' checked='checked' name='enabled'></td>
            <td><a href='index.php?content_page=Member&action=Disable&ID=$id'>Disable</a></td>";
    }
    else
    {
      echo "<td><input disabled='disabled' type='checkbox' name='enabled'></td>
            <td><a href='index.php?content_page=Member&action=Enable&ID=$id'>Enable</a></td>";
    }
    echo "</tr>";
}
?>
  </tbody>
</table>
