<?php
require_once(__DIR__ . '/HEADER.php');
?>

<DOCTYPE html>
    <html>

    <head>
        <link href="Home.css" rel="stylesheet">
    </head>

    <body>
        <div class="search-bar">
            <div class="box-search">
                <div class="searchFilm">
                    <form method="get" action="FILMS.php">
                        <input class="search" type="text" name="movie" placeholder="Movie">
                    </form>
                </div>
                <div class="distributor">
            <form method="get" action="id_distributor.php">
                <input class="search" type="text" name="distributor" placeholder="Distributor">
            </form>
        </div>
                <div class="searchMore">
                    <div class="genre">
                        <form method="get" action="id_genre.php">
                            <label for="genre">genre:</label>
                            <select id="genre" name="genre">
                                <option value="1">Action ⏎</option>
                                <option value="2">Adventure ⏎</option>
                                <option value="3">Animation ⏎</option>
                                <option value="4">Biography ⏎</option>
                                <option value="5">Comedy ⏎</option>
                                <option value="6">Crime ⏎</option>
                                <option value="7">Drama ⏎</option>
                                <option value="8">Family ⏎</option>
                                <option value="9">Fantasy ⏎</option>
                                <option value="10">Horror ⏎</option>
                                <option value="11">Mystery ⏎</option>
                                <option value="12">Romance ⏎</option>
                                <option value="13">Sci-Fi ⏎</option>
                                <option value="14">Thriller ⏎</option>

                            </select>
                            <input type="submit" id="genre">
                        </form>
                    </div>
                </div>

            </div>
        </div>
        
    </body>

    </html>