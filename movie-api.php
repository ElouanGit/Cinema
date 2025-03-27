<?php
     require_once(__DIR__ . '/Cinécult.php');
    require_once(__DIR__ . '/LINKPDO.php');

    $findMovie = "SELECT title  FROM movie where title like '$_POST[movie]%'";
    $req = $bdd->query($findMovie);
    while ($rep = $req->fetch()) {
        echo $rep['title'] . '<br>';
    }
