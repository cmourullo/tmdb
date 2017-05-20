<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apiKey = 'aa9d57434437a8d7d1823229c122fb00';

        $client = new Client([
            'base_uri' => 'https://api.themoviedb.org/3/',
        ]);
        $response = $client->request('GET', 'genre/movie/list'."?api_key=$apiKey");

        $data = json_decode($response->getBody());
        $genres = $data->genres;

        return view('home', compact('genres'));
    }
}
