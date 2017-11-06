<?php require_once 'Views/Shared/Breadcrumb.php'; ?>

<br>
<form method="post" enctype="multipart/form-data" action="index.php?content_page=Member">
  <input type="hidden" name="action" value="Create" />

  <div class="form-group">
    <label for="exampleFormControlSelect1">Display Name</label>
    <input type="text" class="form-control" name="Name" placeholder="Member Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Email (required, but never shown)</label>
    <input type="text" class="form-control" name="Email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Password</label>
    <input type="text" class="form-control" name="Password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Confirm Password</label>
    <input type="text" class="form-control" name="confirm_pwd" placeholder="Confirm Password">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Phone Number</label>
    <input type="text" class="form-control" name="PhoneNumber" placeholder="Phone Number">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Address</label>
    <input type="text" class="form-control" name="Address" placeholder="Address">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Create</button>
  </div>
</form>
