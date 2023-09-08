<?php 

defined( 'ABSPATH' ) || exit;

/**
 *  Defina suas rotas 
 *
 */

$routes = [
    'GET' => [
        '/' => fn() => null,
        '/api/users' => fn() => loadController('UserController', 'users'),
    ],
    'POST' => []
];