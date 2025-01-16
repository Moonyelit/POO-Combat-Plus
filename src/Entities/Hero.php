<?php

class Hero extends BaseHero
{
    public function __construct(string $name, int $PV = 100, int $MP = 100, int $force = 10, int $defense = 10)
    {
        parent::__construct($name, $PV, $MP, $force, $defense);
    }
}
