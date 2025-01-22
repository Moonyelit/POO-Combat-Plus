<?php

abstract class Monster extends Character

{
    public function __construct(string $nom, int $PV, int $PVMax, int $MP, int $MPMax, int $force, int $defense)
    {
        parent::__construct($nom, $PV, $PVMax, $MP, $MPMax, $force, $defense);
    } 
}