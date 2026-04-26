<?php
session_start();
require_once '../../vendor/autoload.php';

use Cinetech\Model\UserModel;

use Cinetech\Database\Database;

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$userModel = new UserModel();
$user = $userModel->getUserById($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Profil - CINETECH</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header>
        <a href="../../index.html" class="logo">CINETECH</a>
        <nav>
            <a href="../../index.html">Accueil</a>
            <a href="#">Films</a>
        </nav>
        <div class="newsletter-form">
            <a href="logout.php" class="fil">Se déconnecter</a>
        </div>
    </header>

    <main>
        <div class="connexion-wrapper">
            <div class="connexion-box">
                <h1>Mon Profil</h1>
                <p><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></p>
                <p><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom']) ?></p>
                <p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
            </div>
        </div>
    </main>

    <footer class="footer">
        <hr class="footer-divider">
        <div class="footer-bottom">
            <span>© 2024 Cinetech — Tous droits réservés</span>
        </div>
    </footer>
</body>
</html>