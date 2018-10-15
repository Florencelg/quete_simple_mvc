<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/dispatcher.php';




/**
$route = $_GET['route'] ?? '';

if ($route === 'items') {
    $controller = new Controller\ItemController;
    $controller->index();
}elseif ($route === 'item') {
    $controller = new Controller\ItemController;
    // la méthode show() de ItemController est appelée et l'id indiqué dans la route lui est passé en paramètre
    $controller->show($_GET['id']);
} else {
    header("HTTP/1.0 404 Not Found");
    echo 'Page introuvable';
}

?>*/
