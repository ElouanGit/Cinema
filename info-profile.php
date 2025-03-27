<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once(__DIR__ . '/connect_db.php');

$req = $bdd->query("INSERT into user(email,firstname,lastname,birthdate,adress,zipcode,city,country) 
values ($_GET[email],$_GET[nom],'$_GET[prénom]','$_GET[date]','$_GET[adress]','$_GET[zipcode]','$_GET[city]','$_GET[country]'");
$current = date('Y-m-d');
$sql = $bdd->query("INSERT into subscription(id_user,id_subscription,date_begin)
 values ('$_GET[choix],'$current'");


echo "Vous etes bien enregistrer !";
echo "Vos info:";