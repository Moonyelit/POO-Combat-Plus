<?php

abstract class Character 
{
    protected string $nom;
    protected string $genre;
    protected int $PV;
    protected int $PVMax;
    protected int $MP;
    protected int $MPMax;
    protected int $force;
    protected int $defense;
    protected ?string $classeName = null;

    // Mon constructeur
    public function __construct(
        string $nom, 
        string $genre, 
        int $PV = 100, 
        int $PVMax = 100, 
        int $MP = 100, 
        int $MPMax = 100, 
        int $force = 10, 
        int $defense = 10,      


    ) {
        $this->nom = $nom;
        $this->genre = $genre;
        $this->PV = $PV;
        $this->PVMax = $PVMax;
        $this->MP = $MP;
        $this->MPMax = $MPMax;
        $this->force = $force;
        $this->defense = $defense;
    }



}