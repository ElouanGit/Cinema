<?php
require_once(__DIR__ . '/connect_db.php');

$req = $bdd->query("SELECT * FROM user ");


$nbr_total_films = $req->rowCount(); //Compte le nombre d'id dans la base

$nbr_films_par_page = 10; //Limite le nombre d'élement de 10 par page

$nbr_page_max_avant_apres = 4; //Nombre de page max qui est affiher



$last_page = ceil($nbr_total_films / $nbr_films_par_page); //Fait un calcul du nombre de page qui me faut 



if (isset($_GET["page"])) {

    $page_num = $_GET["page"];
} else {

    $page_num = 1;
}


$limit = 'LIMIT ' . ($page_num - 1) * $nbr_films_par_page . ',' . $nbr_films_par_page;
$start_from = ($page_num - 1) * $nbr_films_par_page;
$sql = "SELECT firstname, lastname , id FROM user where firstname like '$_POST[user]%' LIMIT $start_from, $nbr_films_par_page";

$pagination = '';
//
if ($last_page != 1) {
    if ($page_num > 1) {
        $previous = $page_num - 1;
        $pagination .= '<a href="user.php?page=' . $previous . '">Précédent</a> &nbsp; &nbsp';

        for ($i = $page_num - $nbr_page_max_avant_apres; $i < $page_num; $i++) {
            if ($i > 0) {
                $pagination .= '<a href="user.php?page=' . $i . '">' . $i . '</a> &nbsp;';
            }
        }
    }
    //CODE BON

    $pagination .= '<span class="active">' . $page_num . '</span>&nbsp;';

    for ($i = $page_num + 1; $i <= $last_page; $i++) {
        $pagination .= '<a href="user.php?page=' . $i . '">' . $i . '</a> ';

        if ($i >= $page_num + $nbr_page_max_avant_apres) {
            break;
        }
    }
    if ($page_num != $last_page) {
        $next = $page_num + 1;
        $pagination .= '<a href="user.php?page=' . $next . '">NEXT</a> ';
    }
}



require_once(__DIR__ . '/HEADER.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <link href="user.css" rel="stylesheet">
</head>

<body>
    <div class="alluser">
        <?php
        $req = $bdd->query($sql);
        while ($data = $req->fetch()) {
            echo '<form method="post" action="user-api.php">';
            echo "ID " . " " . $data['id'] . ' ' . $data['firstname'] . ' ' . $data['lastname'] . " ";
            echo '<input type="hidden" name="user_id" value="' . $data['id'] . '">';
            echo '<input type="submit" value="info">';
            echo '</form><br>';
        }
        echo '<div id="pagination">' . $pagination . '</div>';
        echo "Page <b>$page_num</b> sur <b>$last_page</a>";
        echo "<p><strong>($nbr_total_films)</strong> utilisateurs au total !<br/>";
        ?>
        </form>
    </div>
</body>

</html>