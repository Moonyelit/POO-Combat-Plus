<?php
require_once '../process/choice_hero_process.php';
require_once '../utils/autoloader.php';

// Vérifie si la session est déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Instance du repository des héros
$HeroesRepo = new HeroesRepository();

// Récupération des héros depuis la base de données
$heroes = $HeroesRepo->FindAll();

// Transformer les objets en tableaux pour éviter l'erreur de sérialisation
$heroesArray = [];
foreach ($heroes as $hero) {
    $heroesArray[] = [
        'id' => $hero->getId(),
        'nom' => $hero->getNom(),
        'genre' => $hero->getGenre(),
        'PV' => $hero->getPV(),
        'force' => $hero->getForce(),
        'defense' => $hero->getDefense(),
    ];
}

// Stocker la version tableau dans la session
$_SESSION['heroes'] = $heroesArray;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Héros</title>
    <link rel="stylesheet" href="../public/components/css/choiceHero.css">
    <script src="../public/components/javascript/choiceHero.js" defer></script>
</head>

<body>

    <h1>Choisissez votre héros</h1>

    <div class="hero-container">
        <?php foreach ($heroes as $hero): ?>
            <div id="<?= $hero->getId(); ?>"
                class="hero"
                onclick="selectHero('<?= $hero->getNom() ?>', '<?= $hero->getId(); ?>')">
                <img src="assets/images/Hero/HERO-<?= $hero->getNom() ?>-Suikoden.png" alt="<?= $hero->getNom() ?>">
            </div>
        <?php endforeach; ?>
    </div>

    <form action="../process/choice_hero_process.php" method="post" class="form-container">
        <input type="hidden" name="hero_id" id="selected-hero-id" value="">
        <label for="hero-name">Renommez votre héros :</label>
        <input type="text" id="hero-name" name="hero_name" placeholder="Choisissez un nom" required>
        <br>
        <?php var_dump($heroes) ?>
        <input type="submit" value="Valider">
    </form>

</body>

</html>