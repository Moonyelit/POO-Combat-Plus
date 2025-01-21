<?php

class JoueurMapper
{
    // Convertit un tableau de données en objet Joueur
    public static function mapToObject(array $dataJoueur)
    {
        return new Joueur(
            $dataJoueur['id'] ?? 0,
            $dataJoueur['pseudo'] ?? '',
        );
    }

    // Convertit un objet Joueur en tableau de données
    public static function mapToArray(Joueur $joueur)
    {
        return [
            'id' => $joueur->getId(),
            'pseudo' => $joueur->getPseudo(),
        ];
    }
}
