<?php
include_once '../utils/autoloader.php';  

$new = new HeroesRepository();
$new->FindAll();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Héros</title>
</head>
<body>
    <h1>Choisir votre Héros</h1>
    <form action="../process/create_user_process.php" method="post" enctype="multipart/form-data">
        <!-- Choisir son genre -->
         <div>
        <label for="gender-image">Genre:</label>
        <input type="file" id="gender-image" name="gender-image" accept="image/" required>
        </div>

        <div>
        <label for="name">Nom du Héros:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <input type="submit" value="Créer Héros">
        </div>
    </form>

  
</body>
</html>
