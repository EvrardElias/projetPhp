<?php   

function selectAllRestaurant($dbh)
{
    try {
        $query = 'select * from restaurant';
        $selectRestaurant = $dbh->prepare($query);
        $selectRestaurant -> execute();
        $restaurants = $selectRestaurant->fetchAll();
        return $restaurants;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function selectMyRestaurants($dbh)
{
    try {
        $query = 'select * from restaurant where utilisateurId = :utilisateurId';
        $selectRestaurant = $dbh->prepare($query);
        $selectRestaurant -> execute([
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
        $restaurants = $selectRestaurant->fetchAll();
        return $restaurants;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function selectOneRestaurant($dbh)
{
    try {
        $query = 'select * from restaurant where restaurantId = :restaurantId';
        $selectRestaurant = $dbh->prepare($query);
        $selectRestaurant -> execute([
            'restaurantId' => $_GET["restaurantId"]
        ]);
        $restaurant = $selectRestaurant->fetch();
        return $restaurant;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function createRestaurant($dbh)
{
    try {
        $query = 'insert into restaurant (restaurantNom, restaurantVille, restaurantNumeroTel, restaurantHoraire, restaurantLogo, utilisateurId) values (:restaurantNom, :restaurantVille, :restaurantNumeroTel, :restaurantHoraire, :restaurantLogo, :utilisateurId)';
        $createRestaurant= $dbh->prepare($query);
        $createRestaurant -> execute([
            'restaurantNom' => htmlentities($_POST["nom"]),
            'restaurantVille' => htmlentities($_POST["ville"]),
            'restaurantNumeroTel' => htmlentities($_POST["telephone"]),
            'restaurantHoraire' => htmlentities($_POST["horaire"]),
            'restaurantLogo' => htmlentities($_POST["logo"]),
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }   
}

function updateRestaurant($dbh)
{
    try {
        $query = 'update restaurant set restaurantNom = :restaurantNom, restaurantVille = :restaurantVille, restaurantNumeroTel = :restaurantNumeroTel, restaurantHoraire = :restaurantHoraire, restaurantLogo = :restaurantLogo where restaurantId = :restaurantId';
        $updateRestaurant = $dbh->prepare($query);
        $updateRestaurant -> execute([
            'restaurantNom' => htmlentities($_POST["nom"]),
            'restaurantVille' => htmlentities($_POST["ville"]),
            'restaurantNumeroTel' => htmlentities($_POST["telephone"]),
            'restaurantHoraire' => htmlentities($_POST["horaire"]),
            'restaurantLogo' => htmlentities($_POST["logo"]),
            'restaurantId' => $_GET["restaurantId"]
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function deleteOneRestaurant($dbh)
{
    try {
        $query = 'delete from restaurant where restaurantId = :restaurantId';
        $deleteAllRestaurantsFromUser = $dbh->prepare($query);
        $deleteAllRestaurantsFromUser -> execute([
            'restaurantId' => $_GET["restaurantId"]
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function deleteAllRestaurantsFromUser($dbh)
{
    try {
        $query = 'delete from restaurant where utilisateurId = :utilisateurId';
        $deleteAllRestaurantsFromUser = $dbh->prepare($query);
        $deleteAllRestaurantsFromUser -> execute([
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function phoneNumberFormatted($phoneNumber)
{
    $phoneNumberFormatted = str_replace("/", "", $phoneNumber);
    $phoneNumberFormatted = str_replace(".", "", $phoneNumberFormatted);
    $phoneNumberFormatted = str_replace(" ", "", $phoneNumberFormatted);
    $part1 = substr($phoneNumberFormatted, -6, -4);
    $part2 = substr($phoneNumberFormatted, -4, -2);
    $part3 = substr($phoneNumberFormatted, -2);
    $part4 = substr($phoneNumberFormatted, 0, -6);
    $phoneNumberFormatted = $part4 . "/" . $part1 . "." . $part2 . "." . $part3;
    return $phoneNumberFormatted;
}

function raccourcirChaine($chaine, $tailleMax)
{
    $positionDernierEspace = 0;
    if( strlen($chaine) >= $tailleMax )
    {
      $chaine = substr($chaine,0,$tailleMax);
      $positionDernierEspace = strrpos($chaine,' ');
      $chaine = substr($chaine,0,$positionDernierEspace).'...';
    }
    return $chaine;
}