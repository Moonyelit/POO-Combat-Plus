<?php
require_once '../utils/autoloader.php';

session_start();

$pseudo = $_SESSION['pseudo'] ?? null;

// Vérifier si l'utilisateur est connecté
if (!$pseudo) {
    header('Location: ../public/home.php');
    exit;
}

// Récupérer les héros depuis la base de données
$heroesRepository = new HeroesRepository();
$heroes = $heroesRepository->findAll();

// Stocker les héros en session pour les utiliser sur la page choiceHero
$_SESSION['heroes'] = $heroes;

// Rediriger vers la page de choix du héros
header('Location: ../public/choiceHero.php');
exit;
?>
