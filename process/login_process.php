<?php

require_once '../utils/autoloader.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? ''); // Nettoyage de la saisie

    // Vérification si le champ est vide
    if (empty($pseudo)) {
        $_SESSION['error'] = 'Veuillez entrer un pseudo.';
        header('Location: ../public/home.php');
        exit;
    }

    // Recherche du joueur dans la base de données
    $joueurRepository = new JoueurRepository();
    $joueur = $joueurRepository->findByPseudo($pseudo);

    if ($joueur) {
        // Si le joueur existe, sauvegarde de ses informations dans la session
        $_SESSION['joueur_id'] = $joueur->getId();
        $_SESSION['pseudo'] = $joueur->getPseudo();

        $choixHeroRepository = new ChoixHeroRepository();
        $choixHero = $choixHeroRepository->findByJoueurId($joueur->getId());

        if ($choixHero) {
            // Joueur avec déjà un héros enregistré
            header('Location: ../public/homePlayer.php');
            exit;
        } else {
            // Joueur sans héros enregistré
            header('Location: ../public/choiceHero.php');
            exit;
        }
    } else {
        // Si le joueur n'existe pas, création d'un nouveau joueur
        $joueurId = $joueurRepository->create($pseudo);

        if ($joueurId) {
            $_SESSION['joueur_id'] = $joueurId;
            $_SESSION['pseudo'] = $pseudo;
            header('Location: ../public/choiceHero.php');
            exit;
        } else {
            $_SESSION['error'] = 'Erreur lors de la création du joueur.';
            header('Location: ../public/home.php');
            exit;
        }
    }
} else {
    echo 'Formulaire non soumis correctement.';
}
?>
