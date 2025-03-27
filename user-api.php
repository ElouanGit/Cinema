<?php
require_once(__DIR__ . '/connect_db.php');


$sql = $bdd->query("SELECT user.* , subscription.name as abonnement from user 
join membership on user.id = membership.id_user join subscription on membership.id_subscription = subscription.id where user.id = $_POST[user_id]");
$id = $_POST['user_id'];

require(__DIR__ . '/HEADER.php');
?>
<!DOCTYPE html>

<head>
<link href="user.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="user-box">
        <div class="user-info">
            <?php
            while ($data = $sql->fetch()) {
                $sub = $data['abonnement'];
                echo
                "ID:" . ' ' . $data['id'] . '<br/>' .
                    "Email:" . ' ' . $data['email'] . '<br/>' .
                    "Firstname:" . ' ' . $data['firstname'] . '<br/>' .
                    "Lastname:" . ' ' . $data['lastname'] . '<br/>' .
                    "Birthdate:" . ' ' . $data['birthdate'] . '<br/>' .
                    "Adress:" . ' ' . $data['address'] . '<br/>' .
                    "Zipcode:" . ' ' . $data['zipcode'] . '<br/>' .
                    "City:" . ' ' . $data['city'] . '<br/>' .
                    "Country:" . ' ' . $data['country'] . '<br/>' .
                    "Subscription:" . ' ' . $data['abonnement'] . '<br/>';
            }
        
          
            ?>
            <div class="edit-sub">
            <form method="post" action="edit-user.php">
            <input type="hidden" name="id" value="<?= $id ?>" >

                <label for="choix">Changer votre abonnement :</label>
                <select name="choix" id="choix" required>
                   
                    <option value="1">VIP</option>
                    <option value="2">GOLD</option>
                    <option value="3">CLASSIC</option>
                    <option value="4">PASS DAY</option>
                </select>
                <button type="submit">Envoyer</button>
            </form>
            </div>

            <div class="Del-sub">
            <form method="post" action="del-user.php">
            <input type="hidden" name="id" value="<?= $id ?>" >

                <label for="DELETE">Supprimer votre abonnement :</label>
                <input type="hidden" name="id" value="<?= $id ?>" >
                
               

                <input type="submit" value="Supprimé : <?= $sub ?>">
            </form>
            </div>
        </div>
       
    </div>

</body>