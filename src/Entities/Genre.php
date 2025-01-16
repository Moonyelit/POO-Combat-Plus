<?php

class Genre extends BaseHero
{
    private int $id;
    private string $genre;

    public function __construct(int $id, string $genre)
    {
        $this->id = $id;
        $this->genre = $genre;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;
        return $this;
    }

}