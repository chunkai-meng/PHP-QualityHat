<?php
require_once 'Views/Shared/CheckSession.php';
?>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php?content_page=Shop">
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
          <a class="nav-link" href="index.php?content_page=Shop&ID=1">MENS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?content_page=Shop&ID=2">WOMENS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?content_page=Shop&ID=3">KIDS</a>
        </li>

        <?php if(isset($_SESSION['current_user']) && $_SESSION['current_user'] == 'admin@email.com') { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?content_page=Hat">HAT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?content_page=Category">CATEGORY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?content_page=Supplier">SUPPLIER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?content_page=Member">MEMBER</a>
          </li>
        <?php } ?>

        <?php if(isset($_SESSION['current_user'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?content_page=Order">ORDER</a>
          </li>
        <?php } ?>

      </ul>
      <ul class="navbar-nav form-inline my-2 my-lg-0">
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            if(isset($_SESSION['current_user'])){
              echo "Hi ".$_SESSION['current_user'];
            } else{
              echo "Welcome!";
            }
            ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="index.php?content_page=Member&action=Login">Login</a>
            <a class="dropdown-item" href="index.php?content_page=Member&action=Create">Register</a>
            <a class="dropdown-item" href="index.php?content_page=Member&action=Logout">Logout</a>
          </div>
        </li>
      </ul>

    </div>
  </nav>
</header>
