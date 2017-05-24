<?php

namespace App\Http\Controllers;

use App\Media\Tmdb;

class TmdbController extends Controller
{
    /**
     * @var Tmdb
     */
    private $tmdb;

    /**
     * TmdbController constructor.
     */
    public function __construct()
    {
        /** @var Tmdb tmdb */
        $this->tmdb = resolve('App\Media\Tmdb');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = $this->tmdb->getMovieGenres();

        return view('home', compact('genres'));
    }

    /**
     * @return string
     */
    public function moviesGenre() {
        //TODO: get elements in other way
        $params = $_REQUEST;

        $movies = $this->tmdb->getMoviesByGenre($params['id']);

        return json_encode($movies);
    }

    /**
     * @return string
     */
    public function movieDetails() {
        $params = $_REQUEST;
        $movieId = $params['id'];

        $movieDetails = $this->tmdb->getMovieDetails($movieId);

        return json_encode($movieDetails);
    }
}
