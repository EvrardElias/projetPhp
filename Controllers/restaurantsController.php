<?php

require_once "Model/restaurantModel.php";
require_once "Model/nourritureModel.php";
require_once "Model/etoileModel.php";
require_once "Model/menuModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    $restaurants = selectAllRestaurant($dbh);
    require_once "Templates/Restaurants/pageAcceuil.php";

} elseif ($uri === "/ajouterRestaurant") {
    if (isset($_POST['btnEnvoi'])) {
        createRestaurant($dbh);
        $restaurantId = $dbh->lastInsertId();
        
        for ($i = 0; $i < count($_POST["nourriture"]); $i++){
            $nourritureId = $_POST["nourriture"][$i];
            ajouterNourritureRestaurant($dbh, $restaurantId, $nourritureId);
        }
        ajouterEtoileRestaurant($dbh, $restaurantId, $_POST['etoile']);
        header("location:/mesRestaurants");
    }
    $nourritures = selectAllNourriture($dbh);
    $etoiles = selectAllEtoile($dbh);
    require_once "Templates/Restaurants/editOrCreateRestaurant.php";

} elseif ($uri === "/mesRestaurants") {
    $restaurants = selectMyRestaurants($dbh);
    require_once "Templates/Restaurants/pageAcceuil.php";
} elseif (isset($_GET["restaurantId"]) && $uri === "/voirRestaurant?restaurantId=" . $_GET["restaurantId"]) {
    $restaurant = selectOneRestaurant($dbh);
    $nourritures = selectOneNourriture($dbh);
    $etoiles = selectOneEtoile($dbh);
    $menus = selectAllMenuRestaurant($dbh, $_GET["restaurantId"]);
    require_once "Templates/Restaurants/voirRestaurant.php";
} elseif (isset($_GET["restaurantId"]) && $uri === "/deleteRestaurant?restaurantId=" . $_GET["restaurantId"]) {
    deleteNourritureRestaurant($dbh);
    deleteMenuRestaurant($dbh);
    deleteEtoileRestaurant($dbh);
    deleteOneRestaurant($dbh);
    header("location:/mesRestaurants");
    require_once "Templates/Restaurants/voirRestaurant.php";

} elseif (isset($_GET["restaurantId"]) && $uri === "/updateRestaurant?restaurantId=" . $_GET["restaurantId"]) {
    
    if (isset($_POST['btnEnvoi'])) {
        updateRestaurant($dbh);
        deleteNourritureRestaurant($dbh);
        deleteEtoileRestaurant($dbh);
        for ($i = 0; $i < count($_POST["nourriture"]); $i++){
            $nourritureId = $_POST["nourriture"][$i];
            ajouterNourritureRestaurant($dbh, $restaurantId, $nourritureId);
        }
        ajouterEtoileRestaurant($dbh, $restaurantId, $_POST['etoile']);
        header("location:/mesRestaurants");
    } elseif (isset($_POST['btnMenu'])) {
        $menus = selectAllMenuRestaurant($dbh);
        require_once "Templates/Menus/voirMenu.php";
    }

    $restaurant = selectOneRestaurant($dbh);
    $nourrituresRestaurant = selectOneNourriture($dbh);
    $etoilesRestaurant = selectOneEtoile($dbh);
    $nourritures = selectAllNourriture($dbh);
    $etoiles = selectAllEtoile($dbh);
    $heure = substr($restaurant->restaurantHoraire, 0, 5);
    require_once "Templates/Restaurants/editOrCreateRestaurant.php";
}