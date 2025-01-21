<?php require_once '../process/auth_check.php'; 
$heroes = $_SESSION['heroes'] ?? [];

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
    <?php var_dump($heroes);
 foreach ($heroes as $hero): ?>
        <div id="<?= $hero->getNom(); ?>" class="hero" onclick="selectHero('<?= $hero->getNom(); ?>', '<?= $hero->getId(); ?>')">
        <img src="./assets/images/Hero/HERO-<?= $hero->getNom(); ?>-Suikoden.png" alt="<?= $hero->getNom(); ?>">
        </div>
    <?php endforeach; ?>
</div>


<form action="../process/create_user_process.php" method="post" class="form-container">
    <input type="hidden" name="hero_id" id="selected-hero" value="">
    <label for="hero-name">Renommez votre héros :</label>
    <input type="text" id="hero-name" name="hero_name" placeholder="Choisissez un nom" required>
    <br>
    <input type="submit" value="Valider">
</form>

</body>
</html>
