<?php
session_start();
require_once '../utils/autoloader.php';

if (!isset($_SESSION['joueur_id'])) {
    header('Location: home.php');
    exit;
}

$choixHeroRepo = new ChoixHeroRepository();
$hero = $choixHeroRepo->findByJoueurId($_SESSION['joueur_id']);

if (!$hero) {
    header('Location: choiceHero.php');
    exit;
}

echo "<h1>Bienvenue, " . $_SESSION['pseudo'] . "</h1>";
echo "<p>Votre héros : " . $hero->getNomPersonnalise() . "</p>";
?>
