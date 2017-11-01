<h4>Index</h4>

<p>
    <a href="index.php?content_page=Supplier&action=Create">Create New</a>
</p>
<table class="table table-striped">
  <thead>
          <th>
              Name
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
    echo "
        <tr>
            <td>
                $name
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
