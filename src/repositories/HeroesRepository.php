<?php
final class HeroesRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    // Récupère tous les héros avec leur classe
    public function FindAll(): array
    {
        $query =  "SELECT 
        hero.id AS hero_id,
        hero.nom AS hero_nom,
        hero.genre,
        hero.PV,
        hero.PVMax,
        hero.MP,
        hero.MPMax,  
        hero.FORCE,
        hero.DEFENSE,
        hero_classe.id AS classe_id,
        hero_classe.classe_name,
        hero_classe.boost_pvmax,
        hero_classe.malus_pvmax,
        hero_classe.boost_mpmax,
        hero_classe.malus_mpmax,
        hero_classe.boost_force,
        hero_classe.malus_force,
        hero_classe.boost_defense,
        hero_classe.malus_defense,
        hero_classe.description
        FROM 
        hero
        JOIN 
        hero_classe ON hero.id_hero_classe = hero_classe.id
        LIMIT 0, 25;";

        $stmt = $this->pdo->query($query);
        $heroDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $heroes = [];

        if(empty($heroDatas)){
            die("Aucun héros récupéré depuis la base de données.");
        }

        foreach ($heroDatas as $heroData) {
            $classeHero = new ClasseHero(
                $heroData['classe_id'],
                $heroData['classe_name'],
                $heroData['boost_pvmax'] ?? 0,
                $heroData['malus_pvmax'] ?? 0,
                $heroData['boost_mpmax'] ?? 0,
                $heroData['malus_mpmax'] ?? 0,
                $heroData['boost_force'] ?? 0,
                $heroData['malus_force'] ?? 0,
                $heroData['boost_defense'] ?? 0,
                $heroData['malus_defense'] ?? 0,
                $heroData['description'] ?? ''
            );

            $heroes[] = HeroMapper::mapToObject($heroData, $classeHero);
        }

        return $heroes;
    }

    // Récupère un héros par son identifiant
    public function FindOne(int $id): ?BaseHero
    {
        // Requête SQL pour récupérer un héros et sa classe
        $query = "
            SELECT 
                hero.id AS hero_id,
                hero.nom AS hero_nom,
                hero.genre,
                hero.PV,
                hero.PVMax,
                hero.MP,
                hero.MPMax,
                hero.FORCE,
                hero.DEFENSE,
                hero_classe.id AS classe_id,
                hero_classe.classe_name,
                hero_classe.boost_pvmax,
                hero_classe.malus_pvmax,
                hero_classe.boost_mpmax,
                hero_classe.malus_mpmax,
                hero_classe.boost_force,
                hero_classe.malus_force,
                hero_classe.boost_defense,
                hero_classe.malus_defense,
                hero_classe.description
            FROM 
                hero
            JOIN 
                hero_classe ON hero.id_hero_classe = hero_classe.id
            WHERE 
                hero.id = :id
        ";

        $stmt = $this->pdo->prepare($query);
        // attention a ca
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $heroData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$heroData) {
            return null; // Aucun héros trouvé
        }

        // Créer l'objet ClasseHero
        $classeHero = new ClasseHero(
            $heroData['classe_id'],
            $heroData['classe_name'],
            $heroData['boost_pvmax'],
            $heroData['malus_pvmax'],
            $heroData['boost_mpmax'],
            $heroData['malus_mpmax'],
            $heroData['boostForce'],
            $heroData['malusForce'],
            $heroData['boostDefense'],
            $heroData['malusDefense'],
            $heroData['description'] ?? ''
        );

        // Mapper les données pour créer l'objet Hero
        return HeroMapper::mapToObject($heroData, $classeHero);
    }

    // Sauvegarde un héros par son identifiant
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
