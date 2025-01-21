<?php
require_once '../utils/autoloader.php';

session_start();

$pseudo = $_SESSION['pseudo'] ?? null;

if (!$pseudo) {
    $_SESSION['error'] = 'Veuillez vous connecter.';
    header('Location: ../public/home.php');
    exit;
}

// Vérification de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hero_id'], $_POST['hero_name'])) {
    $heroId = (int) $_POST['hero_id'];
    $nomHero = trim($_POST['hero_name']);

    if ($heroId && $nomHero) {
        $joueurRepo = new JoueurRepository();
        $choixHeroRepo = new ChoixHeroRepository();

        // Récupérer l'ID du joueur en session
        $joueurId = $_SESSION['joueur_id'];

        // Vérification si le joueur a déjà un héros associé
        $existingChoice = $choixHeroRepo->findByJoueurId($joueurId);
        if ($existingChoice) {
            $_SESSION['error'] = 'Vous avez déjà un héros.';
            header('Location: ../public/fight.php');
            exit;
        }

        // Enregistrer le choix du héros pour ce joueur
        $choixHeroRepo->createChoixHero($joueurId, $heroId, $nomHero);

        $_SESSION['message'] = 'Héros enregistré avec succès!';
        header('Location: ../public/fight.php');
        exit;
    } else {
        $_SESSION['error'] = 'Veuillez sélectionner un héros et donner un nom.';
        header('Location: ../public/choiceHero.php');
        exit;
    }
} else {
    $_SESSION['error'] = 'Requête invalide.';
    header('Location: ../public/home.php');
    exit;
}
?>
