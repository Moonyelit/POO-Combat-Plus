<?php
include_once '../utils/autoloader.php';  


$heroesRepository = new HeroesRepository();

$heroes = $heroesRepository->FindAll();

var_dump($heroes);
