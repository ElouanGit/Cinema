<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once(__DIR__ . '/connect_db.php');
require_once(__DIR__ . '/HEADER.php');

$req = $bdd->query("UPDATE membership join user on user.id = membership.id_user 
set membership.id_subscription = 5 where user.id like '%$_POST[id]%'");

$user = $_POST['id'];


?>
<html>
    <head>
    <link href="style.css" rel="stylesheet">
    <link href="user.css" rel="stylesheet">
    </head>
    <div class="verif">
<h4>Votre résiliation a bien été pris en compte on espere vous revoir !</h4>
<form method="post" action="user-api.php">
    <input type="hidden" name="user_id" value="<?= $user ?>">

    <label for="choix">Revenir a vos info :</label>

    <button type="submit">Envoyer</button>
</form>
    </div>
</html>