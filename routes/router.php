<?php

defined( 'ABSPATH' ) || exit;

/**
 * Carregar controller
 * 
 * @param string $controller Nome da classe do controller
 * @param string $action Nome da ação
 */
function loadController(string $controller, string $action) {

    try {
        $controllerNamespace = "App\\Controllers\\{$controller}";
        
        if(!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
        }
    
        $controllerInstace = new $controllerNamespace();
    
        if(!method_exists($controllerInstace, $action)) {
            throw new Exception("O método {$action} não existe no controller {$controller}");
        }
    
        $controllerInstace->$action($_REQUEST);
    
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}