<?php 

abstract class BaseHero 

{
    protected string $name;
    protected int $PV;
    protected int $PVMax;
    protected int $MP;
    protected int $MPMax;
    protected int $force;
    protected int $defense;
    // protected int $speed;
    // protected int $esquive;


//Mon constructeur
protected function __construct(string $name, int $PV = 100, int $MP = 100, int $force = 10, int $defense = 10)
{
    $this->name = $name;
    $this->PV = $PV;
    $this->PVMax = $PV;
    $this->MP = $MP;
    $this->MPMax = $MP;
    $this->force = $force;
    $this->defense = $defense;
//     $this->speed = $speed;
//     $this->esquive = $esquive;
}


//Mes getters
public function getName(): string
{
    return $this->name;
}


public function getPV(): int
{
    return $this->PV;
}

public function getMP(): int
{
    return $this->MP;
}

public function getForce(): int
{
    return $this->force;
}

public function getDefense(): int
{
    return $this->defense;
}

// public function getSpeed(): int
// {
//     return $this->speed;
// }

// public function getEsquive(): int
// {
//     return $this->esquive;
// }

//Mes setters
public function setName(string $name): self
{
    $this->name = $name;
    return $this;
}

public function setPV(int $PV): self
{
    $this->PV = $PV;
    return $this;
}

public function setMP(int $MP): self
{
    $this->MP = $MP;
    return $this;
}

public function setForce(int $force): self
{
    $this->force = $force;
    return $this;
}

public function setDefense(int $defense): self
{
    $this->defense = $defense;
    return $this;
}

// public function setSpeed(int $speed): self
// {
//     $this->speed = $speed;
//     return $this;
// }

// public function setEsquive(int $esquive): self
// {
//     $this->esquive = $esquive;
//     return $this;
// }

}