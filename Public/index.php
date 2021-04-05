<?php

define('ROOT', dirname(__DIR__));
require ROOT . '/App/App.php';

App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'posts.index';
}

$page = explode('.', $page);
if ($page[0] === 'admin') {
    $action = $page[2];
    $controller = '\Agorw\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
} else {
    $action = $page[1];
    $controller = '\Agorw\Controller\\' . ucfirst($page[0]) . 'Controller';
}

$controller = new $controller();
$controller->$action();
