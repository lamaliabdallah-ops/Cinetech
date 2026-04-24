<?php

namespace Cinetech\Model;

use Cinetech\Database\Database;

use \PDO;

class films {

    private $pdo;

    public function __construct() {
        $db = Database::getInstance();
        $this->pdo = $db->getConnexion();
    }

    private function securityInput($input) {
        return trim(htmlspecialchars($input));
    }  


    public function getAll() {
        $data = $this->pdo->prepare('SELECT * FROM  films');
        $data->execute();
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $data = $this->pdo->prepare('SELECT * FROM films WHERE id = :id');
        $data->bindValue(':id', $id, PDO::PARAM_INT);
        $data->execute();
        return $data->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $firstName, $lastName, $email, $telephone ) {
        $data = $this->pdo->prepare('UPDATE films SET nom=:firstName, date_de_sortie=:date_de_sortie, types=:types, WHERE id=:id');
        $data->bindValue(':nom', $this->securityInput($firstName), PDO::PARAM_STR); // mettre les security input dans un controller ou manager
        $data->bindValue(':date_de_sortie', $this->securityInput($lastName), PDO::PARAM_STR);
        $data->bindValue(':types', $this->securityInput($email), PDO::PARAM_STR);
        $data->bindValue(':id', $id,PDO::PARAM_INT);
        return $data->execute();
    }

    public function delete($id) {
        $data = $this->pdo->prepare('DELETE FROM films WHERE id = :id');
        $data->bindValue(':id', $id, PDO::PARAM_INT);
        return $data->execute();
    }

    public function count() {
        return $this->pdo->query('SELECT COUNT(*) FROM films')->fetchColumn();
    }
}
?>