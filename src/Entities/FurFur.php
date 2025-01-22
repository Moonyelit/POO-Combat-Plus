<?php

final class FurFur extends Monster

{
    public function __construct(string $nom = "FurFur", int $PV = 40, int $PVMax = 40, int $MP = 10, int $MPMax = 10, int $force = 2, int $defense = 3)
    {
        parent::__construct($nom, $PV, $PVMax, $MP, $MPMax, $force, $defense);

    }
}