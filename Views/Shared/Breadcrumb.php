<?php
$controller = $_GET['content_page'];
echo "
<nav aria-label='breadcrumb' role='navigation'>
  <ol class='breadcrumb'>
    <li class='breadcrumb-item'>$controller</li>";
if(isset($_GET['action'])){
  $action = $_GET['action'];
  echo "
    <li class='breadcrumb-item active' aria-current='page'>$action</li>";
}
echo "
  </ol>
</nav>
";
?>
