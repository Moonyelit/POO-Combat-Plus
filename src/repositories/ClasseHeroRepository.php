<?php

final class ClasseHeroRepository extends AbstractRepository
{
    public function findAll(): array
    {
        $query = "SELECT * FROM hero_classe";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(); 
        
        $classHeroData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(fn($row) => ClasseHeroMapper::mapToObject($row), $classHeroData);
    }
}