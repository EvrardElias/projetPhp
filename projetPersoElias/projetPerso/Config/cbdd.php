<?php
try{
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=projet', "root", "Youpala2014", [
            PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch(PDOException $e) {
    die("Erreur ! :" . $e->getMessage());
}