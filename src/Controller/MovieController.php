<?php

namespace App\Controller;

use App\Service\TmdbRequestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/movies/now_playing', name: 'movies_now_playing')]
    public function index(TmdbRequestService $tmdb): Response
    {
        $token = $_ENV['TMDB_TOKEN'];
        $movies = $tmdb->getMoviesNowPlaying($token);

        return $this->render('movie/index.html.twig', [
            'movies' => $movies,
        ]);
    }
}
