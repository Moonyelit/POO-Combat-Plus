<?php

class ClasseHero
{
    private int $id;
    private string $classeName;
    private int $boostPvMax;
    private int $malusPvMax;
    private int $boostMpMax;
    private int $malusMpMax;
    private int $boostForce;
    private int $malusForce;
    private int $boostDefense;
    private int $malusDefense;

    public function __construct(
        int $id,
        string $classeName,
        int $boostPvMax,
        int $malusPvMax,
        int $boostMpMax,
        int $malusMpMax,
        int $boostForce,
        int $malusForce,
        int $boostDefense,
        int $malusDefense
    ) {
        $this->id = $id;
        $this->classeName = $classeName;
        $this->boostPvMax = $boostPvMax;
        $this->malusPvMax = $malusPvMax;
        $this->boostMpMax = $boostMpMax;
        $this->malusMpMax = $malusMpMax;
        $this->boostForce = $boostForce;
        $this->malusForce = $malusForce;
        $this->boostDefense = $boostDefense;
        $this->malusDefense = $malusDefense;
    }

    // Getters pour accéder aux boosts/malus
    public function getId(): int { return $this->id; }
    public function getClasseName(): string { return $this->classeName; }
    public function getBoostPvMax(): int { return $this->boostPvMax; }
    public function getMalusPvMax(): int { return $this->malusPvMax; }
    public function getBoostMpMax(): int { return $this->boostMpMax; }
    public function getMalusMpMax(): int { return $this->malusMpMax; }
    public function getBoostForce(): int { return $this->boostForce; }
    public function getMalusForce(): int { return $this->malusForce; }
    public function getBoostDefense(): int { return $this->boostDefense; }
    public function getMalusDefense(): int { return $this->malusDefense; }
}
