<?php
session_start();
require_once '../utils/autoloader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hero_id'], $_POST['hero_name'])) {

    $heroId = (int) $_POST['hero_id'];
    $heroName = trim($_POST['hero_name']);
    $joueurId = $_SESSION['joueur_id'] ?? null;

    // Vérification des données reçues
    if (!$joueurId || $heroId <= 0 || empty($heroName)) {
        $_SESSION['error'] = 'Veuillez sélectionner un héros et donner un nom.';
        header('Location: ../public/choixHero.php');
        exit;
    }

    // Limitation aux héros autorisés (Riou = 1, Nanami = 2)
    $allowedHeroes = [1, 2];
    if (!in_array($heroId, $allowedHeroes)) {
        $_SESSION['error'] = 'Le héros sélectionné n\'est pas valide.';
        header('Location: ../public/choixeHero.php');
        exit;
    }

    $choixHeroRepo = new ChoixHeroRepository();
    
    // Vérification si un héros est déjà enregistré pour ce joueur
    $existingChoice = $choixHeroRepo->findByJoueurId($joueurId);

    if ($existingChoice) {
        $_SESSION['message'] = 'Vous avez déjà un héros enregistré.';
        header('Location: ../public/homePlayer.php');
        exit;
    }

    // Insérer le choix du héros
    $choixHeroRepo->createChoixHero($joueurId, $heroId, $heroName);

    $_SESSION['message'] = 'Héros enregistré avec succès!';
    header('Location: ../public/homePlayer.php');
    exit;
} else {
    $_SESSION['error'] = 'Requête invalide.';
    header('Location: ../public/home.php');
    exit;
}
?>
