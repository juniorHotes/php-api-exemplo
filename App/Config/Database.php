<?php

namespace App\Config;

class Database {

    private $dbdriver = DB_DRIVER;
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pwd = DB_PWD;
    private $dbname = DB_NAME;
    private $trustServerCertificate = DB_TRUST_SERVER_CERTIFICATE;
    private $conn; 

    function __construct() {

        $conn_str = "{$this->dbdriver}:host={$this->host};dbname={$this->dbname};TrustServerCertificate={$this->trustServerCertificate}";

        // Para SQL Server
        if($this->dbdriver === 'sqlsrv') {
            $conn_str = "{$this->dbdriver}:Server={$this->host};Database={$this->dbname};TrustServerCertificate={$this->trustServerCertificate}";
        }

        try {
            $this->conn = new \PDO($conn_str, $this->user, $this->pwd);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $exc) {
            echo 'PDO Error: ' . $exc->getMessage();
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }
}