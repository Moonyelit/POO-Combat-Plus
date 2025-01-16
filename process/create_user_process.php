<?php 
include_once '../utils/autoloader.php';

// Démarrer la session
session_start();

if (!isset($_SESSION['selected_hero'])) {
    $_SESSION['selected_hero'] = 'Riou'; 
}
if (!isset($_SESSION['hero_name'])) {
    $_SESSION['hero_name'] = 'Riou'; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['hero'])) {
        $_SESSION['selected_hero'] = $_POST['hero'];
        $_SESSION['hero_name'] = $_POST['hero'] === 'Riou' ? 'Riou' : 'Nanami';
    }

    if (isset($_POST['hero_name'])) {
        $_SESSION['hero_name'] = $_POST['hero_name'];
    }
}
?>
