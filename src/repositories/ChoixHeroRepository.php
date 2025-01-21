<?php

final class ChoixHeroRepository extends AbstractRepository
{
    public function findByJoueurId(int $joueurId): ?ChoixHero
    {
        $query = $this->pdo->prepare("SELECT * FROM choix_hero WHERE id_joueur = :id LIMIT 1");
        $query->execute(['id' => $joueurId]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data ? ChoixHeroMapper::mapToObject($data) : null;
    }

    public function createChoixHero(int $joueurId, int $heroId, string $nomPersonnalise): ChoixHero
    {
        $choixHeroData = [
            'id_joueur' => $joueurId,
            'id_hero' => $heroId,
            'nom_personnalise' => $nomPersonnalise,
        ];

        $stmt = $this->pdo->prepare(
            "INSERT INTO choix_hero (id_joueur, id_hero, nom_personnalise) 
             VALUES (:id_joueur, :id_hero, :nom_personnalise)"
        );
        $stmt->execute($choixHeroData);

        $choixHeroData['id'] = $this->pdo->lastInsertId();

        return ChoixHeroMapper::mapToObject($choixHeroData);
    }
}
