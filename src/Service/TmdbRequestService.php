<?php

namespace App\Service;

use App\Factory\MovieFactory;
use App\Factory\SeriesFactory;
use App\Repository\SeriesRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TmdbRequestService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private MovieFactory $movieFactory,
        private SeriesFactory $seriesFactory
    ) {}

    public function getMoviesNowPlaying(string $token): array
    {
        $response = $this->httpClient->request('GET', 'https://api.themoviedb.org/3/movie/now_playing', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'accept' => 'application/json',
            ],
            'query' => [
                'language' => 'fr-FR',
                'page' => 1,
            ],
        ]);

        $data = $response->toArray();

        // Ici on renvoie une liste d’objets Movie
        return $this->movieFactory->createMultipleFromTmdbData($data);
    }

    public function getMoviesUpcoming(string $token): array
    {
        $response = $this->httpClient->request('GET', 'https://api.themoviedb.org/3/movie/upcoming', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'accept' => 'application/json',
            ],
            'query' => [
                'language' => 'fr-FR',
                'page' => 1,
            ],
        ]);

        $data = $response->toArray();

        // Ici on renvoie une liste d’objets Movie
        return $this->movieFactory->createMultipleFromTmdbData($data);
    }

    public function getSeriesPopular(string $token): array
    {
        $response = $this->httpClient->request('GET', 'https://api.themoviedb.org/3/tv/popular', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'accept' => 'application/json',
            ],
            'query' => [
                'language' => 'fr-FR',
                'page' => 1,
            ],
        ]);

        $data = $response->toArray();

        // Ici on renvoie une liste d’objets Series
        return $this->seriesFactory->createMultipleFromTmdbData($data);
    }
}
