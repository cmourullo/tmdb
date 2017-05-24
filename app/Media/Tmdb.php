<?php

namespace App\Media;

use GuzzleHttp\Client;

class Tmdb implements TmdbInterface
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
     * Tmdb constructor.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->apiKey = $key;
        $this->baseUri = 'https://api.themoviedb.org/3/';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMovieGenres()
    {
        $uri = "genre/movie/list?api_key=$this->apiKey";

        $data = $this->sendGetRequest($uri);
        $genres = $data->genres;

        return $genres;
    }

    /**
     * @param $movieGenreId
     * @return array
     */
    public function getMoviesByGenre($movieGenreId) {
        $uri = "genre/$movieGenreId/movies?api_key=$this->apiKey";

        $data = $this->sendGetRequest($uri);
        $movies = $data->results;

        return $movies;
    }

    /**
     * @param $movieId
     * @return array
     */
    public function getMovieDetails($movieId) {
        $uri = "movie/$movieId?api_key=$this->apiKey";

        $data = $this->sendGetRequest($uri);

        return $data;
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
