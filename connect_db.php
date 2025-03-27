<?php

try{
    $bdd = new PDO("mysql:host=localhost;dbname=cinema",'Elouan', 'Elouanv2005');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOException $e){
    die("Erreur : ".$e->getMessage());
}
?>

