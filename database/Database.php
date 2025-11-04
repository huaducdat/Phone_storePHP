<?php
class Database
{
    private $pdo;
    private $config;
    public function __construct($config)
    {
        $this->config = $config;
    }
    public function connect()
    {
        if (!$this->pdo) {
            try {
                $dsn = "mysql:host={$this->config['host']};dbname={$this->config['dbname']};charset=utf8mb4";
                $this->pdo = new PDO($dsn, $this->config['username'], $this->config['password']);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("❌ Database connection failed: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}
