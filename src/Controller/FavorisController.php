<?php
namespace Cinetech\Controller;
use Cinetech\Model\FavorisModel;

class FavorisController {
    private $favorisModel;

    public function __construct() {
        $this->favorisModel = new FavorisModel();
    }

    public function addFavori() {
        if (isset($_POST['tmdb_id']) && isset($_SESSION['user_id'])) {
            $this->favorisModel->addFavori(
                $_SESSION['user_id'],
                $_POST['tmdb_id'],
                $_POST['titre']
            );
        }
    }

    public function getFavoris() {
        if (isset($_SESSION['user_id'])) {
            return $this->favorisModel->getFavoris($_SESSION['user_id']);
        }
        return [];
    }
}