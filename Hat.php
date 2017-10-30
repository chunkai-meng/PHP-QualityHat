<?php
include('Views/Hat/CreateHatView.php');
include('Controllers/HatController.php');
include('Models/HatModel.php');

$model = new HatModel();
$controller = new HatController($model);
$view = new CreateHatView($controller, $model);

// Create
if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']."_GET"}();
} elseif (isset($_POST['action']) && !empty($_POST['action'])) {
    $controller->{$_POST['action']."_POST"}();
} else {
    $controller->index();
}

?>
