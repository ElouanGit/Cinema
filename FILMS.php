



  
  
  <?php
    require_once(__DIR__ . '/connect_db.php');

    // Demande les films rechercher
    $req = $bdd->query("SELECT id FROM movie where title like '$_GET[movie]%'");
    $dis = $_GET['movie'];
    $nbr_total_films = $req->rowCount(); //Compte le nombre d'id dans la base

    $nbr_films_par_page = 20; //Limite le nombre d'élement de 10 par page

    $nbr_page_max_avant_apres = 4; //Nombre de page max qui est affiher



    $last_page = ceil($nbr_total_films / $nbr_films_par_page); //Fait un calcul du nombre de page qui me faut 



    if (isset($_GET["page"])) {

        $page_num = $_GET["page"];
    } else {

        $page_num = 1;
    }


    
    $start_from = ($page_num - 1) * $nbr_films_par_page;
    $sql = "SELECT title, duration FROM movie where title like '$_GET[movie]%' LIMIT $start_from, $nbr_films_par_page";

    $pagination = '';
    //
    if ($last_page != 1) {
        if ($page_num > 1) {
            $previous = $page_num - 1;
            $pagination .= '<a href="FILMS.php?movie=' . $dis .'&page=' . $previous . '">Précédent</a> &nbsp; &nbsp';

            for ($i = $page_num - $nbr_page_max_avant_apres; $i < $page_num; $i++) {
                if ($i > 0) {
                    $pagination .= '<a href="FILMS.php?movie=' . $dis . '&page=' . $i . '">' . $i . '</a> &nbsp;';
                }
            }
        }
        //CODE BON

        $pagination .= '<span class="active">' . $page_num . '</span>&nbsp;';

        for ($i = $page_num + 1; $i <= $last_page; $i++) {
            $pagination .= '<a href="FILMS.php?movie=' . $dis . '&page=' . $i . '">' . $i . '</a> ';

            if ($i >= $page_num + $nbr_page_max_avant_apres) {
                break;
            }
        }
        if ($page_num != $last_page) {
            $next = $page_num + 1;
            $pagination .= '<a href="FILMS.php?movie=' . $dis .'&page=' . $next . '">NEXT</a> ';
        }
    }




    require_once(__DIR__ . '/HEADER.php');
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
                 <h1>Films Trouvées ! :</h1>
            </div>
        
        <div class="all_movie">
            <?php
            $req = $bdd->query($sql);

            while ($data = $req->fetch()) {
                echo '<div class="post"><b>' . $data['title'] . " |" . $data['duration'] . "min" . '<br/>';
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
 <!-- echo '<div id="pagination">' . $pagination . '</div>'; -->