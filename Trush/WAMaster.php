<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">
      <img src="images/logos/logos-2.png" height="24" width="110">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?content_page=Shop">All HATS<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?content_page=InformationForAuthors">MENS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?content_page=ManagePaper">WOMENS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?content_page=MVC">KIDS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?content_page=Hat">HAT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?content_page=Category">CATEGORY</a>
        </li>
      </ul>
      <ul class="navbar-nav form-inline my-2 my-lg-0">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="index.php?content_page=Login">Login</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>

    </div>
  </nav>
</header>

<main role="main">
  <br><br><br>
  <div class="container">
    <?php
    foreach (glob("Controllers/*.php") as $filename)
    {
        include $filename;
    }
    foreach (glob("Models/*.php") as $filename)
    {
        include $filename;
    }

    if (isset($_GET['content_page']))
    {
      $page_name = $_GET['content_page'];
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
    elseif (isset($_POST['content_page']))
    {
      $page_name = $_POST['content_page'];
      $page_content = $page_name.'.php';
    }
    else
    {include(shop.php);}

    ?>
  </div>
</main>

<footer class="footer">
  <div class="container">
    <p class="float-right">
      <a href="index.php?content_page=Contact">Contact Us</a>
    </p>
    <p>Quality Hats is &copy; QualityHats, </p>
    <!-- <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p> -->
  </div>
</footer>
