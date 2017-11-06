<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}
?>
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
          <a class="nav-link" href="index.php?content_page=Shop&action=category&ID=1">MENS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?content_page=Shop&action=category&ID=2">WOMENS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?content_page=Shop&action=category&ID=3">KIDS</a>
        </li>
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
        <li class="nav-item">
          <a class="nav-link" href="index.php?content_page=Order">ORDER</a>
        </li>

      </ul>
      <ul class="navbar-nav form-inline my-2 my-lg-0">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            if(isset($_SESSION['current_user'])){
              echo $_SESSION['current_user']."@".$_SESSION['current_userid'];
            } else{
              echo "Down";
            }


            ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="index.php?content_page=Member&action=Login">Login</a>
            <a class="dropdown-item" href="#">Account Info</a>
            <a class="dropdown-item" href="index.php?content_page=Member&action=Logout">Logout</a>
          </div>
        </li>
      </ul>

    </div>
  </nav>
</header>
