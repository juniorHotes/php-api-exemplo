<?php

define('ABSPATH', __DIR__);

require './vendor/autoload.php';

require './App/Config/define_db.php';

require './routes/router.php';
require './routes/routes.php';

/**
 * Captura as rotas
 * 
 */
try {
    $uri = preg_replace('/^\/\w+\/$/', '', parse_url($_SERVER['REQUEST_URI'])['path']);

    $request = $_SERVER['REQUEST_METHOD'];

    if(!isset($routes[$request])) {
        throw new \Exception("O método de requisição não existe");
    }

    if(!array_key_exists($uri, $routes[$request])) {
        throw new \Exception("A rota {$uri} não existe");
    }

    $controller = $routes[$request][$uri];
    $controller();
} catch (\Exeption $e) {
    echo $e->getMessage();
}