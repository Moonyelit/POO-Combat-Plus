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
    header('Location: choixeHero.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/components/css/style.css">

    <title>Mon Héros</title>

    <link rel="stylesheet" href="../public/components/css/style.css">

</head>
<body>
    <h1>Bienvenue, <?= htmlspecialchars($_SESSION['pseudo']) ?></h1>
    <p>Votre héros : <?= htmlspecialchars($hero->getNomPersonnalise()) ?></p>
    <img src="./assets/images/Hero/HERO-<?= htmlspecialchars($hero->getNomPersonnalise()) ?>-Suikoden.png" alt="<?= htmlspecialchars($hero->getNomPersonnalise()) ?>">
</body>
</html>
