<?php

require_once "Model/usersModel.php";
require_once "Model/restaurantModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/connexion") {
    if (isset($_POST['btnEnvoi'])) {
        $messageError = verifEmptyData();
        if(!$messageError){
            connectUser($dbh);
            header('location:/');
        }
    }
    require_once "Templates/users/connexion.php";

} elseif ($uri === "/deconnexion") {
    
    session_destroy();
    header("location:/");

} elseif ($uri === "/profil") {

    require_once "Templates/users/profil.php";

} elseif ($uri === "/updateProfil") {

    if (isset($_POST['btnEnvoi'])) {
        $messageError = verifEmptyData();
        if(!$messageError){
            updateUser($dbh);
            updateSession($dbh);
            header("location:/profil");
        }
    }
    require_once "Templates/users/inscriptionEdit.php";

} elseif ($uri === "/deleteProfil") {
    deleteAllRestaurantsFromUser($dbh);
    deleteUser($dbh);
    header("location:/deconnexion");

} elseif ($uri === "/inscription") {

    if (isset($_POST['btnEnvoi'])) {
        $messageError = verifEmptyData();
        if(!$messageError){
            createUser($dbh);
            header('location:/connexion');
        }
    }
    require_once "Templates/users/inscriptionEdit.php";
}