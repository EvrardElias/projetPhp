<?php

require_once "Model/menuModel.php";
require_once "Model/restaurantModel.php";

if(isset($restaurantId) && $uri === "voirMenu?menuId=" . $_GET["menuId"]) {
    $menus = selectMenuRestaurant($dbh);
    require_once "Templates/Menus/voirMenu.php";
} elseif (isset($_GET["menuId"]) && $uri === "/updateMenu?menuId=" . $_GET["menuId"]) {
    if (isset($_POST['btnEnvoi'])) {
        $messageError = verifEmptyData();
        if(!$messageError){
            updateMenu($dbh);
            header("location:/menus");
        }
    }
}