<?php 

abstract class BaseHero extends Character
{
    protected int $id;

    // Constructeur pour initialiser les propriétés de base du héros
    public function __construct(
        int $id, 
        string $nom, 
        string $genre, 
        int $PV = 100, 
        int $PVMax = 100,
        int $MP = 100, 
        int $MPMax = 100,
        int $force = 10, 
        int $defense = 10
    ) {
        parent::__construct($nom, $genre, $PV, $PVMax, $MP, $MPMax, $force, $defense);
        $this->id = $id;
    }

    // Méthode pour appliquer les boosts/malus d'une classe
    public function applyClassBoosts(ClasseHero $classeHero): self
    {
        $this->PVMax += $classeHero->getBoostPvMax();
        $this->MPMax += $classeHero->getMalusMpMax();
        $this->force += $classeHero->getBoostForce();
        $this->force -= $classeHero->getMalusForce();
        $this->defense += $classeHero->getBoostDefense();
        $this->defense -= $classeHero->getMalusDefense();
        $this->classeName = $classeHero->getClasseName();
        return $this; 
    }

    // Getters
    public function getId(): int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getGenre(): string { return $this->genre; }
    public function getPV(): int { return $this->PV; }
    public function getPVMax(): int { return $this->PVMax; }
    public function getMP(): int { return $this->MP; }
    public function getMPMax(): int { return $this->MPMax; }
    public function getForce(): int { return $this->force; }
    public function getDefense(): int { return $this->defense; }
    public function getClasseName(): ?string { return $this->classeName; }

    // Setters
    public function setId(int $id): self { $this->id = $id; return $this; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }
    public function setPV(int $PV): self { $this->PV = $PV; return $this; }
    public function setPVMax(int $PVMax): self { $this->PVMax = $PVMax; return $this; }
    public function setMP(int $MP): self { $this->MP = $MP; return $this; }
    public function setMPMax(int $MPMax): self { $this->MPMax = $MPMax; return $this; }
    public function setForce(int $force): self { $this->force = $force; return $this; }
    public function setDefense(int $defense): self { $this->defense = $defense; return $this; }
}



