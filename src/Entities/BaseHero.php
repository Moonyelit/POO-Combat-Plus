<?php 

abstract class BaseHero 
{
    protected int $id;
    protected string $nom;
    protected string $nomPerso;
    protected int $PV;
    protected int $PVMax;
    protected int $MP;
    protected int $MPMax;
    protected int $force;
    protected int $defense;
    protected string $sprite; 

    // Mon constructeur
    protected function __construct(
        int $id,
        string $nom, 
        string $nomPerso, 
        int $PV = 100, 
        int $PVMax = 100, 
        int $MP = 100, 
        int $MPMax = 100, 
        int $force = 10, 
        int $defense = 10,      
        string $sprite

    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->nomPerso = $nomPerso;
        $this->PV = $PV;
        $this->PVMax = $PVMax;
        $this->MP = $MP;
        $this->MPMax = $MPMax;
        $this->force = $force;
        $this->defense = $defense;
        $this->sprite = $sprite;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getNomPerso(): string
    {
        return $this->nomPerso;
    }

    public function getPV(): int
    {
        return $this->PV;
    }

    public function getMP(): int
    {
        return $this->MP;
    }

    public function getForce(): int
    {
        return $this->force;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function getSprite(): string 
    {
        return $this->sprite;
    }

    // Setters
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function setNomPerso(string $nomPerso): self
    {
        $this->nomPerso = $nomPerso;
        return $this;
    }

    public function setPV(int $PV): self
    {
        $this->PV = $PV;
        return $this;
    }

    public function setMP(int $MP): self
    {
        $this->MP = $MP;
        return $this;
    }

    public function setForce(int $force): self
    {
        $this->force = $force;
        return $this;
    }

    public function setDefense(int $defense): self
    {
        $this->defense = $defense;
        return $this;
    }

    public function setSprite(string $sprite): self 
    {
        $this->sprite = $sprite;
        return $this;
    }
}
