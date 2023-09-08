<?php

/**
 * Modelo de exemplo
 * 
 */

namespace App\Models;

use App\Config\Database;

class UserModel {

    private $conn;

    function __construct() {
        $this->conn = new Database();
    }

    public function all() {

        $query = "SELECT * FROM Users ORDER BY id DESC;";

        $result = $this->conn->query($query);
        $result->execute();

        if($result and $result->rowCount() !== 0) {
            while($user = $result->fetch(\PDO::FETCH_ASSOC)) {
                $users[] = $user;
            }

            return $users;
        }

        return array();
    }
}