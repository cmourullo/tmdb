<?php

namespace App\Media;

Interface TmdbInterface
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function getMovieGenres();

    /**
     * @param $movieGenreId
     * @return array
     */
    public function getMoviesByGenre($movieGenreId);

    /**
     * @param $movieId
     * @return array
     */
    public function getMovieDetails($movieId);

    /**
     * @param $uri
     * @return mixed
     */
    public function sendGetRequest($uri);
}
