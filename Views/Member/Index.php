<h4>Index</h4>

<p>
    <a href="index.php?content_page=Member&action=Create">Create New</a>
</p>
<table class="table table-striped">
  <thead>
          <th>
             Name
          </th>
          <th>
             Email Confirmed
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
             Enabled
          </th>
          <td>Activation</td>
        </tr>
  </thead>
  <tbody>
<?php
while ($row = $models->fetch_assoc())
{
    $id = $row["id"];
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];
    $customer_name = $row["customer_name"];
    $enabled = $row["enabled"];
    $email_confirmed = $row["email_confirmed"];

    echo "<tr>
          <td>$name</td>
          <td>$address</td>
          <td>$phone</td>
          <td>$customer_name</td>";
    if ($email_confirmed == true)
    {
      echo "<td><input type='checkbox' checked='checked' name='enabled'></td>";
    }
    else
    {
      echo "<td><input type='checkbox' name='enabled'></td>";
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
