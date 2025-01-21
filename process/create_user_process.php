<?php
require_once '../utils/autoloader.php';

session_start();

$pseudo = $_SESSION['pseudo_temp'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hero_name'], $_POST['hero'])) {
    $nomHero = trim($_POST['hero_name']);
    $selectedHero = trim($_POST['hero']);

    if ($pseudo && $nomHero && $selectedHero) {
        $joueurRepo = new JoueurRepository();
        $choixHeroRepo = new ChoixHeroRepository();

        // Vérifier si le pseudo existe déjà pour éviter de dupliquer les comptes
        $existingJoueur = $joueurRepo->findByPseudo($pseudo);

        if ($existingJoueur) {
            $_SESSION['error'] = 'Ce pseudo existe déjà, veuillez en choisir un autre.';
            header('Location: ../public/home.php');
            exit;
        }

        // Insérer le joueur dans la base de données
        $joueurId = $joueurRepo->create($pseudo);

        // Associer le joueur au héros choisi
        $choixHero = $choixHeroRepo->createChoixHero($joueurId, $selectedHero, $nomHero);

        // Enregistrer les informations en session
        $_SESSION['joueur_id'] = $joueurId;
        $_SESSION['pseudo'] = $pseudo;

        // Redirection vers la page joueur
        header('Location: ../public/homePlayer.php');
        exit;
    } else {
        $_SESSION['error'] = 'Veuillez sélectionner un héros et renseigner un nom valide.';
        header('Location: ../public/choiceHero.php');
        exit;
    }
} else {
    $_SESSION['error'] = 'Requête invalide.';
    header('Location: ../public/home.php');
    exit;
}
?>
