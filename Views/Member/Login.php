<?php require_once 'Views/Shared/Breadcrumb.php'; ?>

<br>
<form method="post" enctype="multipart/form-data" action="index.php?content_page=Member">
  <input type="hidden" name="action" value="Login" />


  <div class="form-group">
    <label for="exampleFormControlSelect1">Email</label>
    <input type="text" class="form-control" name="Email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Password</label>
    <input type="password" class="form-control" name="Password" placeholder="Password">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Login</button>
  </div>
</form>
