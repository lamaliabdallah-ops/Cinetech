<?php
session_start();
require_once '../../vendor/autoload.php';
use Cinetech\Controller\FavorisController;

$controller = new FavorisController();
$controller->addFavori();

header('Location: ../../index.html');
exit();