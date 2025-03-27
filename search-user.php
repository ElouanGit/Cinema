<?php
 require_once(__DIR__ . '/connect_db.php');

$req = $bdd->query("SELECT user.id , firstname , lastname  , subscription.name  from user 
join membership on user.id = membership.id_user join subscription on membership.id_subscription = subscription.id where user.firstname like '$_POST[user]%' 
or user.lastname like '$_POST[user]%'");




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
       while ($data = $req->fetch()) {
        echo '<form method="post" action="user-api.php">';
        echo "ID " . " " . $data['id'] . ' ' . $data['firstname'] . ' ' . $data['lastname'];
        echo '<input type="hidden" name="user_id" value="' . $data['id'] . '">';
        echo '<input type="submit" value="info">';
        echo '</form><br>';
    }
        ?>
        </form>
    </div>
    </body>
</html>

   

