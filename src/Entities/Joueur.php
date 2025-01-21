<?php

final class Joueur
{
    private int $id;
    private string $pseudo;

    // Constructeur pour initialiser les propriétés de l'objet Joueur
    public function __construct(int $id, string $pseudo)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
    }

    // Getter pour l'ID du joueur
    public function getId(): int
    {
        return $this->id;
    }

    // Getter pour le pseudo du joueur
    public function getPseudo(): string
    {
        return $this->pseudo;
    }
}
