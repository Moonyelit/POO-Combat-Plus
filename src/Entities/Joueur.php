<?php

final class Joueur
{
    private $id;
    private string $pseudo;


    //mon contructeur

    public function __construct(int $id, string $pseudo)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
    }

    //getter et setter

    public function getId(): int
    {
        return $this->id;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }
}
