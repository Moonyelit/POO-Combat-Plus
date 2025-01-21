<?php

class HeroMapper
{
    // Convertit un tableau de données en objet BaseHero et applique les boosts/malus de la classe
    public static function mapToObject(array $dataHero, ClasseHero $classeHero): BaseHero
    {
        $hero = new class(
            $dataHero['hero_id'] ?? 0,
            $dataHero['hero_nom'] ?? '',
            $dataHero['genre'] ?? '',
            $dataHero['PV'] ?? 0,
            $dataHero['PVMax'] ?? 0,
            $dataHero['MP'] ?? 0,
            $dataHero['MPMax'] ?? 0,
            $dataHero['FORCE'] ?? 0,
            $dataHero['DEFENSE'] ?? 0
        ) extends BaseHero {};

        $hero->applyClassBoosts($classeHero);

        return $hero;
    }
}