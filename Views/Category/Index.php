<?php require_once 'Views/Shared/Breadcrumb.php'; ?>

<p>
    <a href="index.php?content_page=Category&action=Create" class="btn btn-primary">Create New</a>
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
