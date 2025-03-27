<?php
require_once(__DIR__ . '/connect_db.php');

require_once(__DIR__ . '/HEADER.php');

$req = $bdd->query("SELECT movie.title,movie_genre.id_genre FROM movie LEFT JOIN movie_genre on movie.id = movie_genre.id_movie WHERE id_genre = '$_GET[genre]'");
$dis = $_GET['genre'];
$nbr_total_films = $req->rowCount();

$nbr_films_par_page = 20;

$nbr_page_max_avant_apres = 4;

$last_page = ceil($nbr_total_films / $nbr_films_par_page);

if (isset($_GET["page"])) {

    $page_num = $_GET["page"];
} else {

    $page_num = 1;
}


$pagination = '';
$limit = 'LIMIT ' . ($page_num - 1) * $nbr_films_par_page . ',' . $nbr_films_par_page;
$start_from = ($page_num - 1) * $nbr_films_par_page;
$sql = "SELECT movie.title,movie_genre.id_genre FROM movie LEFT JOIN movie_genre on movie.id = movie_genre.id_movie WHERE id_genre = '$_GET[genre]' LIMIT $start_from, $nbr_films_par_page";
if ($last_page != 1) {
    if ($page_num > 1) {
        $previous = $page_num - 1;
        $pagination .= '<a href="id_genre.php?genre=' . $dis . '&page=' . $previous . '">Précédent</a> &nbsp; &nbsp';

        for ($i = $page_num - $nbr_page_max_avant_apres; $i < $page_num; $i++) {
            if ($i > 0) {
                $pagination .= '<a href="id_genre.php?genre=' . $dis . '&page=' . $i . '">' . $i . '</a> &nbsp;';
            }
        }
    }
    //CODE BON

    $pagination .= '<span class="active">' . $page_num . '</span>&nbsp;';

    for ($i = $page_num + 1; $i <= $last_page; $i++) {
        $pagination .= '<a href="id_genre.php?genre=' .$dis . '&page=' . $i . '">' . $i . '</a> ';

        if ($i >= $page_num + $nbr_page_max_avant_apres) {
            break;
        }
    }
    if ($page_num != $last_page) {
        $next = $page_num + 1;
        $pagination .= '<a href="id_genre.php?genre=' . $dis . '&page=' . $next . '">NEXT</a> ';
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <link href="movie.css" rel="stylesheet">
</head>

<body>
    <div class="movie-research">
        <div class="my_movie">
            <div class="number_movie">
                <h1>Films associés</h1>
            </div>
            <div class="all_movie">
                <?php

                $req = $bdd->query($sql);
                while ($data = $req->fetch()) {
                    echo '<div class="post"><b>' . $data['title'] . '<br/>';
                }
                echo '<div id="pagination">' . $pagination . '</div>';

                ?>
                <div class="film_count">
                    <?php
                    echo "Page <b>$page_num</b> sur <b>$last_page</a>";
                    echo "<p><strong>($nbr_total_films)</strong> films au total !<br/>";
                    ?>
                </div>
            </div>
        </div>
</body>

</html>