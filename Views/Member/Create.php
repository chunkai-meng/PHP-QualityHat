<script>
function myFunction() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
      //alert("Passwords Do not match");
	    document.getElementById("demo").innerHTML = "Password not match!";
      document.getElementById("pass1").style.borderColor = "#E34234";
	    document.getElementById("pass1").value = "";
      document.getElementById("pass2").style.borderColor = "#E34234";
	    document.getElementById("pass2").value = "";
      document.getElementById("demo").innerHTML = checkPwd(pass1);
      ok = false;
    }
    else {
	    var isvalid = checkPwd(pass1);
	    if(isvalid == "ok"){
		  ok = true;
	  }
    return ok;
}

function checkPwd(str) {
    if (str.length < 6) {
        return("too_short");
    } else if (str.length > 50) {
        return("too_long");
    } else if (str.search(/\d/) == -1) {
        return("no_num");
    } else if (str.search(/[a-zA-Z]/) == -1) {
        return("no_letter");
    } else if (str.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
        return("bad_char");
    }
    return("ok");
}

</script>
<?php require_once 'Views/Shared/Breadcrumb.php';
if(isset($_GET['username'])){
  $username = $_GET['username'];
  echo "<p>$username Alread Exist!</p>";
}
?>

<p id="demo"></p>
<br>
<form method="post" enctype="multipart/form-data" action="index.php?content_page=Member" onsubmit="return myFunction()">
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
    <label for="exampleFormControlSelect1" id="info">Password</label>
    <input type="password" class="form-control" id="pass1" name="Password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Confirm Password</label>
    <input type="password" class="form-control" id="pass2" name="Confirm_pwd" placeholder="Confirm Password">
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
    <button type="submit" class="btn btn-primary" value="Submit">Create</button>
  </div>
</form>
