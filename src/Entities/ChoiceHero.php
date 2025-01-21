<?php

class ChoixHero
{
    private int $id;
    private int $idJoueur;
    private int $idHero;
    private ?string $nomPersonnalise;

    public function __construct(int $id, int $idJoueur, int $idHero, ?string $nomPersonnalise = null)
    {
        $this->id = $id;
        $this->idJoueur = $idJoueur;
        $this->idHero = $idHero;
        $this->nomPersonnalise = $nomPersonnalise;
    }

    // Getters
    public function getId(): int { return $this->id; }
    public function getIdJoueur(): int { return $this->idJoueur; }
    public function getIdHero(): int { return $this->idHero; }
    public function getNomPersonnalise(): ?string { return $this->nomPersonnalise; }

    // Setters
    public function setNomPersonnalise(?string $nom): void { $this->nomPersonnalise = $nom; }
}
