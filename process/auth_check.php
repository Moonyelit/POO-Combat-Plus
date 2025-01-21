<?php
session_start();

$pseudo = $_SESSION['pseudo'] ?? null;

// Vérification de l'authentification
if (!$pseudo) {
    header('Location: home.php');
    exit;
}
?>
