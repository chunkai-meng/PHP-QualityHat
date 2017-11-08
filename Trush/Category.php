<?php
// include('Views/Category/Create.php');
include('Controllers/CategoryController.php');
include('Models/CategoryModel.php');

$model = new CategoryModel();
$controller = new CategoryController($model);


if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']."_GET"}();
} elseif (isset($_POST['action']) && !empty($_POST['action'])) {
    $controller->{$_POST['action']."_POST"}();
    echo "<script>location.href='index.php?content_page=Category';</script>";
} else {
    $controller->index();
}

?>
