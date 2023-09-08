<?php

/**
 * Modelo de exemplo
 * 
 */

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends Controller {

    public function users(array $params) {

        $UserModel = new UserModel();

        $users = $UserModel->all();

        return $this->send_json_success([ 'users' => $users ]);
    }
}