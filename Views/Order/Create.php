<br>
    <h5>Create New Order</h5>
    <hr />
    <br>
    <form method="post" enctype="multipart/form-data" action="index.php?content_page=Order">
    <input type="hidden" name="action" value="Create" />
    <label for="exampleFormControlSelect1">Upload Image</label>
    <div class="form-group">
        <label class="custom-file">
        <input type="file" name="file" class="custom-file-input">
        <span class="custom-file-control"></span>
        </label>
    </div>
    <div class="form-group">

        <input type="text" class="form-control" name="name" placeholder="Order Name">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="desc" placeholder="Description">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="price" placeholder="Price">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Category</label>
        <select class="form-control" name="category">
<?php
while ($row = $categoryModels->fetch_assoc())
{
  $id = $row["id"];
  $name = $row["name"];
  echo "<option value=$id>$name</option>";
}
?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Supplier</label>
        <select class="form-control" name="supplier">
<?php
while ($row = $supplierModels->fetch_assoc())
{
  $id = $row["id"];
  $name = $row["name"];
  echo "<option value=$id>$name</option>";
}
?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
