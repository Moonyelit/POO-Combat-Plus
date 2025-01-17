<?php

require_once '../utils/autoloader.php';

class HeroMapper
{
    public static function mapToObject(array $dataHero, ClasseHero $classeHero): BaseHero
    {
        $hero = new class(
            $dataHero['id'] ?? 0,
            $dataHero['nom'] ?? '',
            $dataHero['nom_perso'] ?? '',
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