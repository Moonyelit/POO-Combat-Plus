<?php

final class ChoixHeroRepository extends AbstractRepository
{
    public function findByJoueurId(int $joueurId): ?ChoixHero
    {
        $query = $this->pdo->prepare("SELECT * FROM choix_hero WHERE id_joueur = :id LIMIT 1");
        $query->execute(['id' => $joueurId]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return ChoixHeroMapper::mapToObject($data);
    }

    public function createChoixHero(int $joueurId, int $heroId, string $nomPersonnalise): ChoixHero
    {
        $query = "INSERT INTO choix_hero (id_joueur, id_hero, nom_personnalise) VALUES (:id_joueur, :id_hero, :nom_personnalise)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_joueur', $joueurId);
        $stmt->bindParam(':id_hero', $heroId);
        $stmt->bindParam(':nom_personnalise', $nomPersonnalise);
        $stmt->execute();

        // Récupérer l'ID inséré
        $id = $this->pdo->lastInsertId();

        return new ChoixHero($id, $joueurId, $heroId, $nomPersonnalise);
    }
}
