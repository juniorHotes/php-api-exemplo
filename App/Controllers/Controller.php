<?php

namespace App\Controllers;

abstract class Controller {

    /**
     * Resposta de sucesso
     * 
     * @param mixed $data 
     * @param int|null $status_code Status
     */
    public function send_json_success( mixed $data, int|null $status_code = 200 ) {

        header("X-PHP-Response-Code: {$status_code}", true, $status_code);
        header("Content-type: text/json; charset=UTF-8");
        
        echo json_encode(['success' => true, 'data' => $data]);
    }

    /**
     * Resposta de erro
     * 
     * @param mixed $data 
     * @param int|null $status_code Status
     */
    public function send_json_error( mixed $data, int|null $status_code = 500 ) {

        header("X-PHP-Response-Code: {$status_code}", true, $status_code);
        header("Content-type: text/json; charset=UTF-8");

        echo json_encode(['success' => false, 'data' => $data]);
    }
}