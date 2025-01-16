<?php

require_once '../utils/autoloader.php';

class GenreMapper extends HeroMapper
{
    public static function mapToObject(array $dataGenre): Genre
    {
        return new Genre(
            $dataGenre['id'],
            $dataGenre['genre']
        );
    }
}

