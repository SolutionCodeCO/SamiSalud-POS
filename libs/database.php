<?php

class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $pdo;

    public function __construct()
    {
        $this->host = defined('HOST') ? constant('HOST') : '';
        $this->db = defined('DB') ? constant('DB') : '';
        $this->user = defined('USER') ? constant('USER') : '';
        $this->password = defined('PASSWORD') ? constant('PASSWORD') : '';
        $this->charset = defined('CHARSET') ? constant('CHARSET') : '';
    }

    public function connect()
    {
        if ($this->pdo === null) {  // Solo se conecta si no hay una conexión previa
            try {
                $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];

                $this->pdo = new PDO($connection, $this->user, $this->password, $options);
            } catch (PDOException $e) {
                error_log('libs/database.php :: connect -> Connection error: ' . $e->getMessage());
                error_log("===================================================");
                throw new Exception('Database connection error');
            }
        }

        return $this->pdo;  // Devuelve la conexión existente o la nueva
    }

    // Iniciar una transacción
    public function beginTransaction()
    {
        $this->connect()->beginTransaction();
    }

    // Confirmar la transacción
    public function commit()
    {
        $this->connect()->commit();
    }

    // Revertir la transacción
    public function rollBack()
    {
        $this->connect()->rollBack();
    }
    public function lastInsertId() {
        return $this->connect()->lastInsertId();
    }
}
