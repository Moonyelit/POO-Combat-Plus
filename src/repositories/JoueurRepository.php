<?php

final class JoueurRepository extends AbstractRepository
{
    public function __construct()
        {
            parent::__construct(); 
        }
    

public function findByPseudo(string $pseudo): ?Joueur
{
    $query = $this->pdo->prepare('SELECT * FROM joueur WHERE pseudo = :pseudo');
    $query->execute(['pseudo' => $pseudo]);
    $dataJoueur = $query->fetch(PDO::FETCH_ASSOC);

    if (!$dataJoueur) {
        return null;
    }

    return JoueurMapper::mapToObject($dataJoueur);


}
}