<?php 

 abstract class BaseHero 
{
    protected int $id;
    protected string $nom;
    protected string $genre;
    protected int $PV;
    protected int $PVMax;
    protected int $MP;
    protected int $MPMax;
    protected int $force;
    protected int $defense;
    protected ?string $classeName = null;

    // Mon constructeur
    public function __construct(
        int $id,
        string $nom, 
        string $genre, 
        int $PV = 100, 
        int $PVMax = 100, 
        int $MP = 100, 
        int $MPMax = 100, 
        int $force = 10, 
        int $defense = 10,      


    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->genre = $genre;
        $this->PV = $PV;
        $this->PVMax = $PVMax;
        $this->MP = $MP;
        $this->MPMax = $MPMax;
        $this->force = $force;
        $this->defense = $defense;
    }


      // Méthode pour appliquer les boosts/malus d'une classe
      public function applyClassBoosts(ClasseHero $classeHero): self
      {
          $this->PVMax += $classeHero->getBoostPvMax();
          $this->MPMax += $classeHero->getMalusMpMax();
          $this->force += $classeHero->getBoostForce();
          $this->force += $classeHero->getMalusForce();
          $this->defense += $classeHero->getBoostDefense();
          $this->defense += $classeHero->getMalusDefense();
          $this->classeName = $classeHero->getClasseName();
          return $this; 
      }
      

    // Getters
    public function getId(): int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getGenre(): string { return $this->genre; }
    public function getPV(): int { return $this->PV; }
    public function getMP(): int { return $this->MP; }
    public function getForce(): int { return $this->force; }
    public function getDefense(): int { return $this->defense; }
    public function getClasseName(): ?string { return $this->classeName; }


  // Setters
  public function setNom(string $nom): self { $this->nom = $nom; return $this; }
  public function setPV(int $PV): self { $this->PV = $PV; return $this; }
  public function setMP(int $MP): self { $this->MP = $MP; return $this; }
  public function setForce(int $force): self { $this->force = $force; return $this; }
  public function setDefense(int $defense): self { $this->defense = $defense; return $this; }

}



