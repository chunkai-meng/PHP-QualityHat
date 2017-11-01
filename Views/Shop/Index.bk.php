<br><br><br>
<div class='card-group'>
<?php
// $i = 0;
while ($row = $models->fetch_assoc())
{
    $id = $row['id'];
    $image = $row['image'];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $category = $row['category_ID'];
    $supplier = $row['supplier_ID'];

    // if($i%3 ==0){
    //   echo "<div class='row'><div class='card-group'>";
    // }

    echo "
    <div class='card'>
    <span class='border border-light'>
      <img class='card-img-top' src='images/hats/$image' alt='Card image cap' height='242' width='200'>
      <div class='card-body'>
        <h4 class='card-title'>$name</h4>
        <p class='card-text'>$description</p>
      </div>
      <div class='card-footer'>
        <div class='row'>
          <div class='col-xs-6 col-md-8'><h4>$$price</h4></div>
          <div class='col-xs-6 col-md-4' align='right'>
            <form><button type=button class=btn btn-link>Link</button></button></form>
          </div>
        </div>
      </div>
    </span>
    </div>";

    // $i += 1;
    // if($i%3 == 0){
    //   echo "</div></div>";
    // }
}
// if($i%3 != 0){
//   echo "</div></div>";
// }
?>


<!-- echo "    <div class='col-sm-4 col-md-4'>
        <div class='thumbnail'>
            <img class='card-img-top' src='images/hats/$image' height='242' width='200'>
            <div class='caption'>
                <h4>$name</h4>
                <p>$description</p>
      <div class='row'>
        <div class='col-xs-6 col-md-8'>$price</div>
            <div class='col-xs-6 col-md-4' align='right'>
                <form  asp-action='AddToCart' asp-controller='ShoppingCart' asp-route-id='@item.HatID'><button class='btn btn-default btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button></form>
            </div>
      </div>
            </div>
        </div>
    </div>"; -->


</div>
