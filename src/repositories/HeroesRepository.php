<?php

final class HeroesRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function FindAll(): array
    {
        $query = "SELECT * FROM hero";
        $stmt = $this->pdo->query($query);
        $heroDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $heroes = [];

        foreach ($heroDatas as $heroData) {
            $heroes[] = HeroMapper::mapToObject($heroData);
        }

        return $heroes;
    }



    public function FindOne(string $name): ?BaseHero
    {
        $query = "SELECT * FROM hero WHERE name = :name";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['name' => $name]);
        $heroData = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!$heroData) {
            return null;
        }

        return HeroMapper::mapToObject($heroData);
    }



    public function saveHero(string $name): ?BaseHero
    {
        $stmt = $this->pdo->prepare('INSERT INTO hero (name) VALUES (:name)');
        $stmt->execute(['name' => $name]);

        $heroCreation = self::FindOne($name);

        return $heroCreation;
    }
}
