<?php 

namespace App\Classes;

use PDO;
use PDOException;
class PdoConnection {
    private static $pdo = null;

    private function __construct() {}

    public static function getConnection(): PDO
    {
         $host = $_ENV["DATABASE_HOST"];
         $username = $_ENV["DATABASE_USERNAME"];
         $password = $_ENV["DATABASE_PASSWORD"];
         $database = $_ENV["DATABASE_NAME"];
         $charset = 'utf8mb4';
         $connection_str = "mysql:host={$host};dbname={$database};charset={$charset}";

         $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            self::$pdo = new \PDO($connection_str, $username, $password, $options);
        } catch (\PDOException $e) { 
            echo "Connection to database has failed!". $e->getMessage();
        }

        return  self::$pdo;
     }

}