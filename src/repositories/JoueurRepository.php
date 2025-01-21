<?php

final class JoueurRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    // Trouve un joueur par son pseudo
    public function findByPseudo(string $pseudo): ?Joueur
    {
        $query = $this->pdo->prepare('SELECT * FROM joueur WHERE pseudo = :pseudo');
        $query->execute(['pseudo' => $pseudo]);
        $dataJoueur = $query->fetch(PDO::FETCH_ASSOC);

        if (!$dataJoueur) {
            return null;
        }

        return JoueurMapper::mapToObject($dataJoueur);
    }

    // Crée un nouveau joueur avec le pseudo donné
    public function create(string $pseudo): ?int
    {
        try {
            $query = "INSERT INTO joueur (pseudo) VALUES (:pseudo)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return (int)$this->pdo->lastInsertId();
            }
            return null;
        } catch (PDOException $e) {
            error_log("Erreur lors de l'insertion du joueur : " . $e->getMessage());
            return null;
        }
    }
}
