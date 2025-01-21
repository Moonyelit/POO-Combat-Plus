<?php

require_once '../utils/autoloader.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? '');

    // Vérification si le champ est vide
    if (empty($pseudo)) {
        $_SESSION['error'] = 'Veuillez entrer un pseudo valide.';
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

        header('Location: ../public/homePlayer.php');
        exit;
    } else {
        // Si le joueur n'existe pas, redirection vers la création d'un héros
        $_SESSION['error'] = 'Pseudo introuvable. Veuillez créer un héros.';
        header('Location: ../public/choiceHero.php');
        exit;
    }
}
