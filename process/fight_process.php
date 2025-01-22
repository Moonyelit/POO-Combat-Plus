<?php 
require_once '../utils/autoloader.php';

session_start();
// session_unset();


if (!isset($_SESSION['pseudo']) ||!isset($_SESSION['id_hero']) || !isset($_SESSION['id_joueur']) || !isset($_SESSION['nom_personnalise']) || !isset($_SESSION['heroes'])) {
    header('Location: ../public/home.php');
    exit;
}

/**
 * @var string $pseudo
 */
$pseudo= $_SESSION['pseudo'];


/**
 * @var int $id_hero
 */
$id_hero = $_SESSION['heroId'];

/**
 * @var int $id_joueur
 */
$id_joueur = $_SESSION['joueur_id'];

/**
 * @var string $nom_personnalise
 */
$nom_personnalise = $_SESSION['heroName'];

/**
 * @var heroes $hero
 */
$hero = $_SESSION['heroes'];


$monster = new FurFur();

$_SESSION['monster'] = $monster;


// var_dump($monster);
// var_dump($id_hero);
// var_dump($id_joueur);
// var_dump($nom_personnalise);

// header('Location: ../public/fight.php');