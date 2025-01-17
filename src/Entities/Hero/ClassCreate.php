<?php 

class ClasseCreate 
{
    protected int $id;
    protected string $classeName;


    public function __construct(int $id, string $classeName)
    {
        $this->id = $id;
        $this->classeName = $classeName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getClasseName(): string
    {
        return $this->classeName;
    }



    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setClasseName(string $classeName): self
    {
        $this->classeName = $classeName;
        return $this;
    }



}

