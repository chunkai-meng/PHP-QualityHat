<br>
<h4>Create New</h4>
<hr />
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
    <button type="submit" class="btn btn-primary">Create</button>
  </div>
</form>
