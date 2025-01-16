<?php
include_once '../utils/autoloader.php';  
include_once '../src/Repositories/Heros/HeroesRepository.php';


$new = new HeroesRepository();
$new->FindAll();



