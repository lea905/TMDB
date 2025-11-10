<?php

namespace App\Factory;

use App\Entity\Movie;

class MovieFactory
{
    private const GENRE_MAP = [
        28 => 'Action',
        12 => 'Aventure',
        16 => 'Animation',
        35 => 'Comédie',
        80 => 'Crime',
        99 => 'Documentaire',
        18 => 'Drame',
        10751 => 'Familial',
        14 => 'Fantastique',
        36 => 'Histoire',
        27 => 'Horreur',
        10402 => 'Musique',
        9648 => 'Mystère',
        10749 => 'Romance',
        878 => 'Science-Fiction',
        10770 => 'Téléfilm',
        53 => 'Thriller',
        10752 => 'Guerre',
        37 => 'Western',
    ];

    public function createMultipleFromTmdbData(array $data): array
    {
        $movies = [];

        foreach ($data['results'] as $movieData) {
            $movies[] = $this->createFromTmdbData($movieData);
        }

        return $movies;
    }

    public function createFromTmdbData(array $movieData): Movie
    {
        $movie = new Movie();

        // Conversion des id genres en noms lisibles
        $genreNames = [];
        if (isset($movieData['genre_ids'])) {
            foreach ($movieData['genre_ids'] as $id) {
                if (isset(self::GENRE_MAP[$id])) {
                    $genreNames[] = self::GENRE_MAP[$id];
                }
            }
        }

        return $movie
            ->setTitle($movieData['title'] ?? '')
            ->setResume($movieData['overview'] ?? '')
            ->setPicture($movieData['poster_path'] ?? '')
            ->setReleaseDate(isset($movieData['release_date']) ? new \DateTime($movieData['release_date']) : null)
            ->setGenres($genreNames);
    }
}
