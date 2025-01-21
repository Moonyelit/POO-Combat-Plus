<?php
session_start();

if (!isset($_SESSION['joueur_id'])) {
    header('Location: home.php');
    exit;
}

$joueurNom = $_SESSION['joueur_nom'];

echo "<h1>Bienvenue, $joueurNom</h1>";
echo "<p>Voici votre héros :</p>";
// Ici, tu peux récupérer les données du héros lié au joueur
?>
