<?php
session_start();
require_once '../utils/autoloader.php';

// Récupérer les héros si ce n'est pas déjà fait
if (!isset($_SESSION['heroes'])) {
    $HeroesRepo = new HeroesRepository();
    $heroes = $HeroesRepo->FindAll();

    // Transformer les objets en tableaux pour éviter les problèmes de sérialisation
    $heroesArray = [];
    foreach ($heroes as $hero) {
        $heroesArray[] = [
            'id' => $hero->getId(),
            'nom' => $hero->getNom(),
            'genre' => $hero->getGenre(),
            'PV' => $hero->getPV(),
            'force' => $hero->getForce(),
            'defense' => $hero->getDefense(),
        ];
    }

    // Stocker les héros dans la session
    $_SESSION['heroes'] = $heroesArray;
}

// Vérification de la soumission du formulaire
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

    // Enregistrement du héros dans la base de données
    $choixHeroRepo->createChoixHero($joueurId, $heroId, $heroName);

    $_SESSION['message'] = 'Héros enregistré avec succès !';
    header('Location: ../public/homePlayer.php');
    exit;
}
?>
