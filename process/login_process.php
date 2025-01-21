<?php

require_once '../utils/autoloader.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? ''); 

    if (empty($pseudo)) {
        $_SESSION['error'] = 'Veuillez entrer un pseudo.';
        header('Location: ../public/home.php');
        exit;
    }

    $joueurRepository = new JoueurRepository();
    $joueur = $joueurRepository->findByPseudo($pseudo);

    if ($joueur) {
        $_SESSION['joueur_id'] = $joueur->getId();
        $_SESSION['pseudo'] = $joueur->getPseudo();

        $choixHeroRepository = new ChoixHeroRepository();
        $choixHero = $choixHeroRepository->findByJoueurId($joueur->getId());

        if ($choixHero) {
            header('Location: ../public/fight.php');
            exit;
        } else {
            header('Location: ../public/choiceHero.php');
            exit;
        }
    } else {
        $joueurId = $joueurRepository->create($pseudo);

        if ($joueurId) {
            $_SESSION['joueur_id'] = $joueurId;
            $_SESSION['pseudo'] = $pseudo;
            header('Location: ../public/choiceHero.php');
            exit;
        } else {
            $_SESSION['error'] = 'Erreur lors de la création du joueur. Veuillez réessayer.';
            header('Location: ../public/home.php');
            exit;
        }
    }
}
?>
