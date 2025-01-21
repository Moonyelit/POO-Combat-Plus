<?php

session_start();

$pseudo = $_SESSION['pseudo_temp'] ??null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Héros</title>
    <link rel="stylesheet" href="../public/components/css/choiceHero.css">
    <script src="../public/components/javascript/home.js"></script>
</head>
<body>
    
<h1>Choisissez votre héros</h1>
    <form action="../process/create_user_process.php" method="post" class="hero-container">
        <!-- Riou -->
        <div id="Riou" class="hero" onclick="selectHero('Riou')">
            <img src="./assets/images/Hero/HERO-Riou-Suikoden.png" alt="Riou">
        </div>

        <!-- Nanami -->
        <div id="Nanami" class="hero" onclick="selectHero('Nanami')">
            <img src="./assets/images/Hero/HERO-Nanami-Suikoden.png" alt="Nanami">
        </div>

        <!-- Champ caché pour transmettre le héros sélectionné -->
        <input type="hidden" name="hero" id="selected-hero" value="">
    </form>

    <!-- Formulaire pour renommer le héros -->
    <form action="../public/fight.php" method="post" class="form-container">
        <label for="hero-name">Renommez votre héros :</label>
        <input type="text" id="hero-name" name="hero_name"" required>
        <br>
        <input type="submit" value="Valider">
    </form>


  
</body>
</html>
