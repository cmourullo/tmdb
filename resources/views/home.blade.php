@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    The movie database
                    <table class="table">
                        <tr>
                            <th>Gender</th>
                            <th>Movie</th>
                            <th>Details</th>
                        </tr>
                        <tr>
                            <td>movie gender</td>
                            <td>movie name</td>
                            <td>movie details</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
