<?php

require_once '../utils/autoloader.php';

class HeroMapper
{
    public static function mapToObject(array $dataHero, ClasseHero $classeHero): BaseHero
    {        $hero = new class(
            $dataHero['id'],
            $dataHero['nom'],
            $dataHero['nom_perso'],
            $dataHero['genre'],
            $dataHero['PV'],
            $dataHero['PVMax'],
            $dataHero['MP'],
            $dataHero['MPMax'],
            $dataHero['FORCE'],
            $dataHero['DEFENSE']
        ) extends BaseHero {};

        $hero->applyClassBoosts($classeHero);

        return $hero;
    }

}