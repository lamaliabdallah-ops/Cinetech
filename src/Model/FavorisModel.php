<?php
namespace Cinetech\Model;
use Cinetech\Database\Database;
use PDO;

class FavorisModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnexion();
    }

    public function addFavori($id_user, $tmdb_id, $titre) {
        $stmt = $this->pdo->prepare("INSERT INTO favoris (id_user, tmdb_id, titre_films) VALUES (:id_user, :tmdb_id, :titre)");
        $stmt->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindValue(':tmdb_id', $tmdb_id, PDO::PARAM_INT);
        $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getFavoris($id_user) {
        $stmt = $this->pdo->prepare("SELECT * FROM favoris WHERE id_user = :id_user");
        $stmt->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}