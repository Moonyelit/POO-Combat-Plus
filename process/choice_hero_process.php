<?php
session_start();
require_once '../utils/autoloader.php';          

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hero_id'], $_POST['hero_name'])) {
    $heroId = (int) $_POST['hero_id'];
    $heroName = trim($_POST['hero_name']);
    $joueurId = $_SESSION['joueur_id'] ?? null;

    if (!$joueurId) {
        $_SESSION['error'] = 'Erreur de session. Veuillez vous reconnecter.';
        header('Location: ../public/home.php');
        exit;
    }

    if (empty($heroId) || empty($heroName)) {
        $_SESSION['error'] = 'Veuillez sélectionner un héros et donner un nom.';
        header('Location: ../public/choixHero.php');
        exit;
    }

    // Création d'une instance du repository
    $choixHeroRepo = new ChoixHeroRepository();
    
    // Vérification si un héros est déjà enregistré pour ce joueur
    $existingChoice = $choixHeroRepo->findByJoueurId($joueurId);

    if ($existingChoice) {
        $_SESSION['message'] = 'Vous avez déjà un héros enregistré.';
        header('Location: ../public/homePlayer.php');
        exit;
    }

    // Enregistrement du héros dans la table choix_hero
    $choixHeroRepo->createChoixHero($joueurId, $heroId, $heroName);

    $_SESSION['message'] = 'Héros enregistré avec succès !';
    header('Location: ../public/homePlayer.php');
    exit;
}
?>
