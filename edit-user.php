<?php
require_once(__DIR__ . '/connect_db.php');
require_once(__DIR__ . '/HEADER.php');


$req = $bdd->query("UPDATE membership join user on user.id = membership.id_user 
set membership.id_subscription = $_POST[choix] where user.id like '%$_POST[id]%'");

$user = $_POST['id'];
$sub = $_POST['choix'];


?>
<html>
    <head>
    <link href="style.css" rel="stylesheet">
    <link href="user.css" rel="stylesheet">
    </head>
    <div class="verif">
        <?php
        switch($sub){
            case 1:
                echo "Vous avez choissis l'offre VIP félicitations !";
                break;
            case 2:
                echo "Vous avez choissis l'offre GOLD félicitations !";
                break;
            case 3:
                echo "Vous avez choissis l'offre CLASSIC félicitations !";
                break;
            case 4:
                echo "Vous avez choissis l'offre Pass Day félicitations !";
                break;
            }
            ?>

<form method="post" action="user-api.php">
            <input type="hidden" name="user_id" value="<?= $user ?>" >

                <label for="choix">Revenir a vos info :</label>
               
                <button type="submit">Envoyer</button>
            </form>
    </div>
</html>