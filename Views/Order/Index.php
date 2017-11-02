<?php 
session_start(); 
echo 'Session ID: '. session_id();
if(isset($_SESSION['views']))  $_SESSION['views']=$_SESSION['views']+1;
else  $_SESSION['views']=1;
echo "<br>Views=". $_SESSION['views']; 
echo "<br>". password_hash("P@ssw0rd", PASSWORD_DEFAULT);

$hash = password_hash("P@ssw0rd", PASSWORD_DEFAULT);

if (password_verify('P@ssw0rd', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?> 
<h4>Index</h4>

<p>
    <a href="index.php?content_page=Order&action=Create">Create New</a>
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
    $image = $row["image"];
    $name = $row["name"];
    $desc = $row["description"];
    $price = $row["price"];
    $category = $row["category_ID"];
    $supplier = $row["supplier_ID"];

echo "
    <tr>
        <td>
        <img src='images/hats/$image' width='60' height='60' />
        </td>
        <td>
            $name
        </td>
        <td>
            $price
        </td>
        <td>
            $category
        </td>
        <td>
            $supplier
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
