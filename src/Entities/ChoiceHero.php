<?php

class ChoixHero
{
    private int $id;
    private int $idJoueur;
    private int $idHero;
    private ?string $nomPersonnalise;

    // Constructeur pour initialiser les propriétés de l'objet ChoixHero
    public function __construct(int $id, int $idJoueur, int $idHero, ?string $nomPersonnalise = null)
    {
        $this->id = $id;
        $this->idJoueur = $idJoueur;
        $this->idHero = $idHero;
        $this->nomPersonnalise = $nomPersonnalise;
    }

    // Getter pour l'ID du choix de héros
    public function getId(): int { return $this->id; }
    // Getter pour l'ID du joueur
    public function getIdJoueur(): int { return $this->idJoueur; }
    // Getter pour l'ID du héros
    public function getIdHero(): int { return $this->idHero; }
    // Getter pour le nom personnalisé du héros
    public function getNomPersonnalise(): ?string { return $this->nomPersonnalise; }

    // Setter pour le nom personnalisé du héros
    public function setNomPersonnalise(?string $nom): void { $this->nomPersonnalise = $nom; }
}
