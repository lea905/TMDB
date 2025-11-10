<?php

namespace App\Controller;

use App\Service\TmdbRequestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movies')]
class MovieController extends AbstractController
{
    #[Route('/now_playing', name: 'movies_now_playing')]
    public function now_playing(TmdbRequestService $tmdb): Response
    {
        $token = $_ENV['TMDB_TOKEN'];
        $movies = $tmdb->getMoviesNowPlaying($token);

        return $this->render('movie/now_playing.html.twig', [
            'movies' => $movies,
        ]);
    }

    #[Route('/upcoming', name: 'movies_upcoming')]
    public function upcoming(TmdbRequestService $tmdb): Response
    {
        $token = $_ENV['TMDB_TOKEN'];
        $movies = $tmdb->getMoviesUpcoming($token);

        return $this->render('movie/upcoming.html.twig', [
            'movies' => $movies,
        ]);
    }
}
