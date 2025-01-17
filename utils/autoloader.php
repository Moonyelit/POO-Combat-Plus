<?php

spl_autoload_register(function ($className) {
    // Base directory (src)
    $baseDir = __DIR__ . '/../src/';

    // Déterminer le répertoire en fonction du suffixe du nom de la classe
    switch (true) {
        case substr($className, -10) === 'Repository':
            $directory = 'Repositories';
            break;
        case substr($className, -7) === 'Manager':
            $directory = 'Managers';
            break;
        case substr($className, -6) === 'Mapper':
            $directory = 'Mappers';
            break;
        case substr($className, -8) === 'Contract':
            $directory = 'Interfaces';
            break;
        case substr($className, -10) === 'Controller':
            $directory = 'Controllers';
            break;
        case substr($className, -7) === 'Service':
            $directory = 'Services';
            break;
        case substr($className, -5) === 'Trait':
            $directory = 'Traits';
            break;
        default:
            $directory = 'Entities';
            break;


            
        case substr($className, -4) === 'Hero':
            $directory = 'Entities/Hero';
            break;
        case substr($className, -4) === 'Hero':
            $directory = 'Mappers/Hero';
            break;
        case substr($className, -4) === 'Hero':
            $directory = 'Repositories/Hero';
            break;
    }

    // Remplacer les séparateurs de namespace par des séparateurs de répertoire
    $className = str_replace('\\', '/', $className);

    // Construire le chemin complet du fichier
    $file = $baseDir . $directory . '/' . $className . '.php';

    // Charge le fichier si trouvé
    if (file_exists($file)) {
        require $file;
    }
});
