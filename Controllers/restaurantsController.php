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
    $nourriture = selectAllNourriture($dbh);
    $etoile = selectAllEtoile($dbh);
    $menus = selectMenuByRestaurant($dbh, $_GET["restaurantId"]);
    require_once "Templates/Restaurants/voirRestaurant.php";
}


