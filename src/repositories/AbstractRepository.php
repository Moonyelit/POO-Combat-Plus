<?php

abstract class AbstractRepository 
{
    protected PDO $pdo;

    // Constructeur pour initialiser la connexion PDO
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
}