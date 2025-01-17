<?php

require_once '../utils/autoloader.php';

 class HeroMapper 
{
   public static function mapToObject (array $dataHero): BaseHero
   {
    return new HeroEntity(
        $dataHero['id'],
        $dataHero['nom'],
        $dataHero['nom_perso'],
        $dataHero['PV'],
        $dataHero['PVMax'],
        $dataHero['MP'],
        $dataHero['MPMax'],
        $dataHero['force'],
        $dataHero['defense'],
        $dataHero['sprite']
    );
   } 
}