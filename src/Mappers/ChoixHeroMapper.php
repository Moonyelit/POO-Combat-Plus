<?php

class ChoixHeroMapper
{
    public static function mapToObject(array $data): ChoixHero
    {
        return new ChoixHero(
            $data['id'] ?? 0,
            $data['id_joueur'] ?? 0,
            $data['id_hero'] ?? 0,
            $data['nom_personnalise'] ?? null
        );
    }

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
