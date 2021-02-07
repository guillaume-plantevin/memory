<?php
namespace App\Classes;

// On "importe" PDO
use PDO;
use PDOException;

class Db extends PDO
{
    // Instance unique de la classe
    protected $host = 'localhost';
    protected $dbname = 'memory';
    protected $username = 'root';
    protected $password = '';
    protected $db;
    protected $table;

    /**
     *
     */
    public function __construct()
    {
        $this->setdb();
        $this->table = $this->getTableName();
    }

    /**
     *
     */
    public function setdb()
    {
        $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));

        return $this->db;
    }

    /**
     *
     */
    public function getTableName()
    {
        $classnamespace = get_class($this);

        $classnamespace = explode('\\', $classnamespace);
        $class = end($classnamespace);
        $class = strtolower($class);
        $table = str_replace('memory', '', $class);

        return $table;
    }
}
?>