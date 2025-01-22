<?php
session_start();

// Récupérer les héros stockés en session
$heroes = $_SESSION['heroes'] ?? [];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Héros</title>
    <link rel="stylesheet" href="../public/components/css/choiceHero.css">
    <link rel="stylesheet" href="../public/components/css/style.css">
    <script src="../public/components/javascript/choiceHero.js" defer></script>
</head>

<body>

    <h1>Choisissez votre héros</h1>

    <div class="hero-container">
        <?php foreach ($heroes as $hero): ?>
            <div id="<?= $hero['id']; ?>"
                class="hero"
                onclick="selectHero('<?= htmlspecialchars($hero['nom']); ?>', '<?= $hero['id']; ?>')">
                <img src="assets/images/Hero/HERO-<?= htmlspecialchars($hero['nom']); ?>-Suikoden.png" 
                     alt="<?= htmlspecialchars($hero['nom']); ?>">
            </div>
        <?php endforeach; ?>
    </div>

    <form action="../process/choice_hero_process.php" method="post" class="form-container">
        <input type="hidden" name="hero_id" id="selected-hero-id" value="">
        <label for="hero-name">Renommez votre héros :</label>
        <input type="text" id="hero-name" name="hero_name" placeholder="Choisissez un nom" required>
        <br>
        <input type="submit" value="Valider">
    </form>

</body>

</html>
