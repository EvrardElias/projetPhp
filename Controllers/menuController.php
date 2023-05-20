<?php

require_once "Model/menuModel.php";
require_once "Model/restaurantModel.php";

if($uri === "voirMenu?restaurantId=" . $_GET["restaurantId"]) {
    $menus = selectAllMenuRestaurant($dbh);
    require_once "Templates/Menus/voirMenu.php";

} elseif (isset($_GET["menuId"]) && $uri === "/updateMenu?menuId=" . $_GET["menuId"]) {
    if (isset($_POST['btnEnvoi'])) {
        $messageError = verifEmptyData();
        if(!$messageError){
            updateMenu($dbh);
            header("location:/menus");
        }
    }
    require_once "Templates/Menus/editOrCreateMenu.php";
}



//<a href="voirMenu?restaurantId=<?= $restaurant->restaurantId ?>" class="button">Voir menu</a>