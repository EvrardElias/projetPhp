<?php
try{
    $dbh = new PDO('mysql:host=localhost;dbname=projet', "root", "Youpala2014", [
    //$dbh = new PDO('mysql:host=10.10.51.98;dbname=elias', "elias", "root", [
            PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch(PDOException $e) {
    die("Erreur ! :" . $e->getMessage());
}