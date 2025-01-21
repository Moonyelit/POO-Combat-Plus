<?php
require_once '../utils/autoloader.php';

class JoueurMapper
{
    public static function mapToObject(array $dataJoueur)
    {
        return new Joueur(
            $dataJoueur['id'] ?? 0,
            $dataJoueur['pseudo'] ?? '',
        );
    }

    public static function mapToArray(Joueur $joueur)
    {
        return [
            'id' => $joueur->getId(),
            'pseudo' => $joueur->getPseudo(),
        ];
    }
}
