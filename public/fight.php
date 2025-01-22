<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat</title>
    <link rel="stylesheet" href="../public/components/css/fight.css">
    <link rel="stylesheet" href="../public/components/css/style.css">


</head>

<body>
    <header>


    </header>

    <div class="fenetre fenetre-1">
        <div>
            <?= htmlspecialchars($_SESSION['heroName']) ?> ❤️ Point de vie / Point de vie Max
        </div>

    </div>

    <div class="fenetre fenetre-2">
        <div>
            <?= htmlspecialchars($_SESSION['heroName']) ?> ❤️ Point de vie / Point de vie Max
        </div>

    </div>

    <div class="monsters">
        <div class="monster-1">
            <img src="../public/assets/images/Combat/fur-fur.png"
                alt="Image d'un monstre FurFur">
        </div>
    </div>


    <div class="fenetre fenetre-3">
        <div>
            Information sur le combat ici
        </div>
    </div>

    <div class="heroes">
        <div class="heroes-1">
            <img src="../public/assets/images/Combat/nanami.png"
                alt="Image d'un héros">
        </div>

    </div>
</body>

</html>