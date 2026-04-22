<?php
namespace CINETECH\Database;

use CINETECH\Database\Database;

require_once("./src/Database/Database.php");

if (!isset($_SESSION)) {
    session_start();
}

$pdo = Database::getInstance()->getConnexion();

$message = "";

if (isset($_POST['submit'])) {
    $email    = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['email']  = $user['email'];
            $_SESSION['nom']    = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            header('Location: index.php');
            exit();
        } else {
            $message = "<span style='color:#e50914'>Email ou mot de passe incorrect.</span>";
        }
    } else {
        $message = "<span style='color:#e50914'>Veuillez remplir tous les champs.</span>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - CINETECH</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<main>
    <div class="connexion-wrapper">
        <div class="connexion-box">
            <h1>Connexion</h1>

            <?php if (!empty($message)) echo "<p>$message</p>"; ?>

            <form method="post">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="exemple@email.com" required>

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>

                <input type="submit" name="submit" value="Se connecter">

                <p class="account">
                    Pas de compte ? <a href="inscription.php">S'inscrire</a>
                </p>
            </form>
        </div>
    </div>
</main>
</body>
</html>