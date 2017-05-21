$(document).ready(function () {
    $('.movies_genre').click(function () {
        // console.log("id=" + this.id);
        $.get('movies_genre?id=' + this.id, function (data) {
            // $('#movies').text(data);
            var movies = $.parseJSON(data);
            $('.movies').empty().append("<h3>Movies</h3>");
            $.each(movies, function (key, movie) {
                    if (movie['original_title']) {
                        $('.movies').append("<div class='btn btn-default btn-movie movie_details' id='" + movie['id'] + "' >" + movie['original_title'] + "</div>");
                    }
                    console.log(movie);
            });
        });
    });

    $(document).on("click", '.movie_details',function() {
        $.get('movie_details?id=' + this.id, function (data) {
            var movieDetails = $.parseJSON(data);
            // $('.movie_detail').empty();
            $('.movie_detail').empty().append(
                "<h3>Movie details</h3>"+
                "<table class='table'><tr><th>Name</th><th>Description</th><th>Votes</th></tr><tr>"+
                    "<td>"+ movieDetails['original_title']+"</td>"+
                    "<td>"+ movieDetails['overview']+"</td>"+
                    "<td>"+ movieDetails['vote_average']+"</td>"+
                "</tr></table>"
            );
            console.log(data);
        });
    });
});