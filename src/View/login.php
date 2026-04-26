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
        <hr class="footer-divider">
        <div class="footer-bottom">
            <span>© 2024 Cinetech — Tous droits réservés</span>
        </div>
    </footer>
</body>
</html>