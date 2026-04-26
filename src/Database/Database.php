<?php
namespace Cinetech\Database;
class Database {
    private static $instance;
    private \PDO $pdo;

    private function __construct() {
        $this->pdo = new \PDO(
            "mysql:host=lamali-abdallah.students-laplateforme.io;dbname=lamali-abdallah_lamali;charset=utf8",
            'lamali',
            'lamali26100',
            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
        );
    }

    public static function getInstance() {
        if (self::$instance === NULL) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function getConnexion(): \PDO{
        return $this->pdo;
    }
}




?>