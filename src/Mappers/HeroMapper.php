<?php

require_once '../utils/autoloader.php';

 class HeroMapper 
{
   public static function mapToObject (array $dataHero): BaseHero
   {
    return new BaseHero(
        $dataHero['id'],
        $dataHero['nom'],
        $dataHero['nom_perso'],
        $dataHero['genre'],
        $dataHero['PV'],
        $dataHero['PVMax'],
        $dataHero['MP'],
        $dataHero['MPMax'],
        $dataHero['force'],
        $dataHero['defense'],
    );
   } 
}