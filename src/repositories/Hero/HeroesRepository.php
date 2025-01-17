<?php
include_once '../utils/autoloader.php';



final class HeroesRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }



    // BASE HERO

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


    // SELECTION HERO
    public function FindOne(int $id): ?BaseHero
    {
        $query = "SELECT * FROM hero WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $heroData = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!$heroData) {
            return null;
        }

        return HeroMapper::mapToObject($heroData);
    }


// SAUVER HERO
    public function saveHero(int $id): ?BaseHero
    {
        $query = 'INSERT INTO hero (id) VALUES (:id)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $heroCreation = self::FindOne($id);

        return $heroCreation;
    }

}
