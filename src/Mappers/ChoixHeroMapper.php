<?php

class ChoixHeroMapper
{
    // Convertit un tableau de données en objet ChoixHero
    public static function mapToObject(array $data): ChoixHero
    {
        return new ChoixHero(
            $data['id'] ?? 0,
            $data['id_joueur'] ?? 0,
            $data['id_hero'] ?? 0,
            $data['nom_personnalise'] ?? null
        );
    }

    // Convertit un objet ChoixHero en tableau de données
    public static function mapToArray(ChoixHero $choixHero): array
    {
        return [
            'id' => $choixHero->getId(),
            'id_joueur' => $choixHero->getIdJoueur(),
            'id_hero' => $choixHero->getIdHero(),
            'nom_personnalise' => $choixHero->getNomPersonnalise(),
        ];
    }
}
