@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>The movie database</h2></div>

                <div class="panel-body">
                    <div class="movie-section">
                        <h3>Genres</h3>
                        @foreach ($genres as $genre)
                            <button type="button" class="btn btn-info btn-movie movies_genre" id="{{ $genre->id }}">
                                {{ $genre->name }}
                            </button>
                        @endforeach
                    </div>

                    <div class="movies movie-section">
                    </div>

                    <div class="movie_detail movie-section">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
