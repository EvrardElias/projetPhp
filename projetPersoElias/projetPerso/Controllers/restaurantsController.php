<?php

//require_once "Model/restaurantModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    //$restaurants = SelectionnerRestaurants($dbh);
    require_once "Templates/Restaurants/pageAcceuil.php";
}
//elseif ($uri === '/restaurant?restaurantId=' .$_GET["restaurantId"]) {
  //  $restaurant = RecupRestaurant($pdo);
    //require_once "Templates/Restaurants/pageAcceuil.php"
//}