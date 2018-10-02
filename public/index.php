<?php
require __DIR__ . '/../vendor/autoload.php';

use Controller\ItemController;


$item = new ItemController();
$item ->index();
?>
