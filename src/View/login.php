<?php

session_start();
require_once '../../vendor/autoload.php';

use Cinetech\Database\Database;
use Cinetech\Controller\UserController;

$loginController = new UserController();
$message = $loginController->login();

$success = '';
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $success = "Inscription réussie ! Vous pouvez vous connecter.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - CINETECH</title>
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
            <a href="register.php" class="fil">S'inscrire</a>
            <a href="login.php" class="fil">Se connecter</a>
        </div>
    </header>

    <main>
        <div class="connexion-wrapper">
            <div class="connexion-box">
                <h1>Connexion</h1>

                <?php if (!empty($success)): ?>
                    <p style="color: green;"><?= htmlspecialchars($success) ?></p>
                <?php endif; ?>

                <?php if (!empty($message)): ?>
                    <p style="color: red;"><?= htmlspecialchars($message) ?></p>
                <?php endif; ?>

                <form method="post">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="exemple@email.com" required>

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>

                    <input type="submit" name="submit" value="Se connecter">

                    <p class="account">
                        Pas de compte ? <a href="register.php">S'inscrire</a>
                    </p>
                </form>
            </div>
        </div>
    </main>

 <footer class="footer">
    <div class="footer-newsletter">
        <div class="newsletter-text">
            <h4>Restez informé</h4>
            <p>Recevez les dernières sorties cinéma chaque semaine</p>
        </div>
    </div>
    <div class="footer-grid">
        <div class="footer-col-brand">
            <div class="footer-logo"> CINETECH</div>
            <p class="footer-desc">
                Votre bibliothèque personnelle de films et séries.
                Découvrez, notez et partagez vos coups de cœur cinéma.
            </p>
            <div class="footer-socials">
                <a class="social-btn" href="#" title="Twitter"></a>
                <a class="social-btn" href="#" title="Instagram"></a>
                <a class="social-btn" href="#" title="Discord"></a>
            </div>
        </div>

        <div class="footer-col">
            <h4>Navigation</h4>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="#">Films</a></li>
                <li><a href="#">Mes Details</a></li>
                <li><a href="#">Rechercher</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Genres</h4>
            <ul>
                <li><a href="#">Action</a></li>
                <li><a href="#">Comédie</a></li>
                <li><a href="#">Drame</a></li>
                <li><a href="#">Horreur</a></li>
                <li><a href="#">Science-fiction</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Infos</h4>
            <ul>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Confidentialité</a></li>
                <li><a href="#">Mentions légales</a></li>
            </ul>
        </div>

    </div>
    <hr class="footer-divider">
    <div class="footer-bottom">
        <span>© 2024 Cinetech — Tous droits réservés</span>
        <div class="tmdb-badge">
            <span>Données fournies par The Movie Database</span>
        </div>
        <span>Fait avec pour le cinéma</span>
    </div>

</footer>
</body>
</html>