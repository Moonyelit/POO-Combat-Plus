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



public function FindOne(int $id): BaseHero
{
    $query = "SELECT * FROM hero WHERE name = :name";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute(['id' => $id]);
    $heroData = $stmt->fetch(PDO::FETCH_ASSOC);

    return HeroMapper::mapToObject($heroData);
}


}
