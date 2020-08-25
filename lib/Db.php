<?php

namespace lib;

/**
 * Class Db
 * Handles MySQL operations
 */
class Db
{
    private $pdo;
    private static $instance;
    private $stmt;
    public $error;

    /**
     * __construct
     *
     * @return void
     */
    private function __construct()
    {
        $dsn = 'mysql:host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE;
        try {
            $this->pdo = new \PDO($dsn, DB_USERNAME, DB_PASSWORD);
            $this->pdo->exec("set names utf8");
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
        } catch (\PDOException $e) {
            die('error');
            $this->error = $e->getMessage();
        }
    }
   
    /**
     * Get Db instance
     *
     * @return Db instance
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Db();
        }
        
        return self::$instance;
    }
     
    /**
     * Prepare statement with query
     *
     * @param  string $sql
     * @param  array $params
     * @return array
     */
    public function query($sql, $params)
    {
        $this->stmt = $this->pdo->prepare($sql);
        return $this->stmt->execute($params);
    }

    /**
     * Get result set as array of arrays
     *
     * @param  string $sql
     * @param  array $params
     * @return array
     */
    public function fetchAll($sql, $params = [])
    {
        $this->query($sql, $params);
        return $this->stmt->fetchAll();
    }
    
    /**
     * Gets single record as array
     *
     * @param  string $sql
     * @param  array $params
     * @return array
     */
    public function fetchSingle($sql, $params = [])
    {
        $this->query($sql, $params);
        return $this->stmt->fetch();
    }

    /**
     * Get row count
     *
     * @return int
     */
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    /**
     * Get last inserted Id
     *
     * @return int
     */
    public function lastId()
    {
        return $this->pdo->lastInsertId();
    }
}
