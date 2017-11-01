
  <section class='jumbotron text-center'>
    <div class='container'>
      <h1 class='jumbotron-heading'>Album example</h1>
      <p class='lead text-muted'>Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href='#' class='btn btn-primary'>Main call to action</a>
        <a href='#' class='btn btn-secondary'>Secondary action</a>
      </p>
    </div>
  </section>

  <div class='container marketing'>

      <div class='row'>

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
}
?>


    </div>
  </div>
