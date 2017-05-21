<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class TmdbController extends Controller
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $baseUri;

    /**
     * TmdbController constructor.
     */
    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
        $this->baseUri = 'https://api.themoviedb.org/3/';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uri = "genre/movie/list?api_key=$this->apiKey";

        $data = $this->sendGetRequest($uri);
        $genres = $data->genres;

        return view('home', compact('genres'));
    }

    /**
     * @return string
     */
    public function moviesGenre() {
        $params = $_REQUEST;
        $movieGenreId = $params['id'];

        $uri = "genre/$movieGenreId/movies?api_key=$this->apiKey";

        $data = $this->sendGetRequest($uri);
        $movies = $data->results;

        return json_encode($movies);
    }

    /**
     * @return string
     */
    public function movieDetails() {
        $params = $_REQUEST;
        $movieId = $params['id'];

        $uri = "movie/$movieId?api_key=$this->apiKey";

        $data = $this->sendGetRequest($uri);

        return json_encode($data);
    }

    /**
     * @param $uri
     * @return mixed
     */
    public function sendGetRequest($uri)
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request('GET', $uri);

        return json_decode($response->getBody());
    }
}
