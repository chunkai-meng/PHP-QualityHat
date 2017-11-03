<?php require_once 'Views/Shared/Breadcrumb.php'; ?>

<br>
<form method="post" enctype="multipart/form-data" action="index.php?content_page=Category">
<input type="hidden" name="action" value="Create" />

<div class="form-group">
<label for="exampleFormControlSelect1">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Category Name">
</div>
<div class="form-group">
<label for="exampleFormControlSelect1">Description</label>
    <input type="text" class="form-control" name="desc" placeholder="Description">
</div>
<button type="submit" class="btn btn-primary">Create</button>
</form>
