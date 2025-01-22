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
            $_SESSION['heroId'] = $choixHero->getId();
            $_SESSION['heroName'] = $choixHero->getNomPersonnalise();
            var_dump($_SESSION['heroId']);
            var_dump($_SESSION['heroName']);

            header('Location: ./fight_process.php');
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
            header('Location: ../public/choiceHero.php');
            exit;
        } else {
            $_SESSION['error'] = 'Erreur lors de la création du joueur. Veuillez réessayer.';
            header('Location: ../public/home.php');
            exit;
        }
    }
}
