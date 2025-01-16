<?php

require_once '../utils/autoloader.php';

class HeroMapper 
{
   public static function mapToObject (array $data): BaseHero
   {
    return new BaseHero(
        $data['name'],
        $data['PV'],
        $data['MP'],
        $data['force'],
        $data['defense']
    );
   } 
}