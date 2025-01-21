<?php
session_start();
require_once '../utils/autoloader.php';

// Vérifier si les héros sont déjà stockés pour éviter la redirection infinie
if (!isset($_SESSION['heroes'])) {
    $heroesRepository = new HeroesRepository();
    $heroes = $heroesRepository->findAll();

    if (!empty($heroes)) {
        $_SESSION['heroes'] = array_map(function ($hero) {
            return [
                'id' => $hero->getId(),
                'nom' => $hero->getNom(),
                'genre' => $hero->getGenre(),
                'PV' => $hero->getPV(),
                'PVMax' => $hero->getPVMax(),
                'MP' => $hero->getMP(),
                'MPMax' => $hero->getMPMax(),
                'force' => $hero->getForce(),
                'defense' => $hero->getDefense(),
            ];
        }, $heroes);

        // Redirection uniquement si les données ont été stockées
        header('Location: ../public/choiceHero.php');
        exit;
    } else {
        echo "Aucun héros trouvé dans la base de données.";
        exit;
    }
} else {
    echo "Les héros sont déjà en session.";
    // Si les héros sont en session, rediriger vers la page de sélection
    header('Location: ../public/choiceHero.php');
    exit;
}

?>
