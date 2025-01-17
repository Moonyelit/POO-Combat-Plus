<?php
final class HeroesRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }



    // BASE HERO AVEC SA CLASSE

    public function FindAll(): array
    {

        $query =  "SELECT 
        hero.id AS hero_id,
        hero.nom AS hero_nom,
        hero.nom_perso,
        hero.genre,
        hero.PV,
        hero.PVMax,
        hero.MP,
        hero.MPMax,
        hero.FORCE,
        hero.DEFENSE,
        hero_classe.id AS classe_id,
        hero_classe.classe_name,
        hero_classe.boostPvMax,
        hero_classe.malusMpMax,
        hero_classe.boostForce,
        hero_classe.malusForce,
        hero_classe.boostDefense,
        hero_classe.malusDefense
    FROM 
        hero
    JOIN 
        hero_classe ON hero.id_hero_classe = hero_classe.id
";
        $stmt = $this->pdo->query($query);
        $heroDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $heroes = [];

        foreach ($heroDatas as $heroData) {

            $classeHero = new ClasseHero(
                $heroData['classe_id'],
                $heroData['classe_name'],
                $heroData['boostPvMax'],
                $heroData['malusMpMax'],
                $heroData['boostForce'],
                $heroData['malusForce'],
                $heroData['boostDefense'],
                $heroData['malusDefense']
            );

            $heroes[] = HeroMapper::mapToObject($heroData, $classeHero);
        }

        return $heroes;
    }


    // SELECTION HERO
    public function FindOne(int $id): ?BaseHero
    {
        // Requête SQL pour récupérer un héros et sa classe
        $query = "
            SELECT 
                hero.id AS hero_id,
                hero.nom AS hero_nom,
                hero.nom_perso,
                hero.genre,
                hero.PV,
                hero.PVMax,
                hero.MP,
                hero.MPMax,
                hero.FORCE,
                hero.DEFENSE,
                hero_classe.id AS classe_id,
                hero_classe.classe_name,
                hero_classe.boostPvMax,
                hero_classe.malusMpMax,
                hero_classe.boostForce,
                hero_classe.malusForce,
                hero_classe.boostDefense,
                hero_classe.malusDefense
            FROM 
                hero
            JOIN 
                hero_classe ON hero.id_hero_classe = hero_classe.id
            WHERE 
                hero.id = :id
        ";
    
        $stmt = $this->pdo->prepare($query);
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
            $heroData['boostPvMax'],
            $heroData['malusMpMax'],
            $heroData['boostForce'],
            $heroData['malusForce'],
            $heroData['boostDefense'],
            $heroData['malusDefense']
        );
    
        // Mapper les données pour créer l'objet Hero
        return HeroMapper::mapToObject($heroData, $classeHero);
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
