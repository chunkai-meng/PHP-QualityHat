<h4>Index</h4>

<p>
    <a href="index.php?content_page=Hat&action=Create">Create New</a>
</p>
<table class="table table-striped">
  <thead>
        <tr>
          <th>
              Image
          </th>
          <th>
              Name
          </th>
          <th>
              Price
          </th>
          <th>
              Category
          </th>
          <th>
              Supplier
          </th>
          <th>
              Description
          </th>
        </tr>
  </thead>
  <tbody>
<?php
while ($row = $models->fetch_assoc())
{

    $name = $row["name"];
    $desc = $row["description"];
    $price = $row["price"];
    $image = $row["image"];

echo "
    <tr>
        <td>
        <img src='/images/hats/$image' width='60' height='60' />
        </td>
        <td>
            $name
        </td>
        <td>
            $price
        </td>
        <td>
            Mens
        </td>
        <td>
            Adidas
        </td>
        <td>
            $desc
        </td>
    </tr>
";
}
?>
  </tbody>
</table>
