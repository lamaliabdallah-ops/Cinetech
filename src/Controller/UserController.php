<?php
namespace Cinetech\Controller;
use Cinetech\Model\UserModel;

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register() {
        $error = '';

        if (isset($_POST['submit'])) {
            $nom             = trim($_POST['lastName']);
            $prenom          = trim($_POST['FirstName']);
            $email           = trim($_POST['email']);
            $mot_de_passe    = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if (empty($nom) || empty($prenom) || empty($email) || empty($mot_de_passe)) {
                $error = "Tous les champs sont requis";

            } elseif ($mot_de_passe !== $confirmPassword) {
                $error = "Les mots de passe ne correspondent pas";

            } elseif (strlen($mot_de_passe) < 6) {
                $error = "Le mot de passe doit contenir au moins 6 caractères";

            } elseif ($this->userModel->emailExists($email)) {
                $error = "Cet email existe déjà";

            } else {
                if ($this->userModel->register($nom, $prenom, $email, $mot_de_passe)) {
                    header("Location: register.php?success=1");
                    exit();
                } else {
                    $error = "Erreur lors de l'inscription";
                }
            }
        }
        return $error;
    }

    public function login() {
        $error = '';

        if (isset($_POST['submit'])) {
            $email        = trim($_POST['email']);
            $mot_de_passe = $_POST['password'];

            if (empty($email) || empty($mot_de_passe)) {
                $error = "Tous les champs sont requis";

            } else {
                $user = $this->userModel->login($email, $mot_de_passe);

                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['nom']     = $user['nom'];
                    header('Location: profil.php');
                    exit();
                } else {
                    $error = "Email ou mot de passe incorrect";
                }
            }
        }
        return $error;
    }
}