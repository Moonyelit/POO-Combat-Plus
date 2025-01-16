<?php

final class GenreRepository extends AbstractRepository
{
    public function findAll(): array
    {
        $query = "SELECT * FROM hero_genre";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(); 

        $genreData = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return array_map(fn($row) => GenreMapper::mapToObject($row), $genreData);
    }
}