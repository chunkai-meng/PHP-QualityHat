<!-- index is the entrance of the whole site, involving all the header info -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logos/logos-site-QH.ico">

    <title>Quality Hats</title>
    <!-- <link rel="shortcut icon" href="/images/logos/logos-site-QH.ico" /> -->
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
    <!-- <link href="sticky-footer-navbar.css" rel="stylesheet"> -->
  </head>

  <body>
<?php
include('Views/Shared/Header.php');
echo '<main role="main">
        <br><br><br>
        <div class="container">';
Route();
echo    '</div>
      </mail>';
include('Views/Shared/Footer.php');
?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>

<?php

function Route(){
  foreach (glob("Controllers/*.php") as $filename)
  {
      include $filename;
  }
  foreach (glob("Models/*.php") as $filename)
  {
      include $filename;
  }


  if (isset($_GET['content_page']))
    $page_name = $_GET['content_page'];
  else
    $page_name = "Shop";


  $modelName = $page_name.'Model';
  $model = new $modelName();
  $controllerName = $page_name.'Controller';
  $controller = new $controllerName($model);

  if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']."_GET"}();
  } elseif (isset($_POST['action']) && !empty($_POST['action'])) {
      $controller->{$_POST['action']."_POST"}();
  } else {
      $controller->index();
  }
}
?>
