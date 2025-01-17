<?php

class HeroManager
{

    private ClasseHeroRepository $classeHeroRepository;
    private GenreRepository $genreRepository;
    private HeroesRepository $heroesRepository; 


    public function __construct()
    {
        $this->classeHeroRepository = new ClasseHeroRepository();
        $this->genreRepository = new GenreRepository();
        $this->heroesRepository = new HeroesRepository();
    }

    public function getAllHeroes(): array
    {
        $heroes = $this->heroesRepository->findAll();
        $result = [];

        foreach ($heroes as $hero) {
            $classeHero = $this->classeHeroRepository->find($hero->getClasseHeroId());
            $genre = $this->genreRepository->find($hero->getGenreId());
            $result[] = new Hero($classeHero, $genre, $hero);
        }

        return $result;
    }
}

class Hero
{
    private $classeHero;
    private $genre;
    private $hero;

    public function __construct($classeHero, $genre, $hero)
    {
        $this->classeHero = $classeHero;
        $this->genre = $genre;
        $this->hero = $hero;
    }

    // Ajoutez des getters pour accéder aux propriétés si nécessaire
}