<?php

function selectMenuRestaurant($dbh)
{
    try {
        $query = 'select * from menu where menuId in (select menuId from menu_restaurant where restaurantId = :restaurantId)';
        $selectMenu = $dbh->prepare($query);
        $selectMenu->execute([
            'restaurantId' => $_GET["restaurantId"]
        ]);
        $menus = $selectMenu->fetchAll();
        return $menus;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function createMenu($dbh)
{
    try {
        $query = 'insert into menu (menuNom, menuPrix, MenuDescription) values (:menuNom, :menuPrix, :MenuDescription)';
        $createMenu = $dbh->prepare($query);
        $createMenu -> execute([
            'menuNom' => htmlentities($_POST["nom"]),
            'menuPrix' => htmlentities($_POST["prix"]),
            'MenuDescription' => htmlentities($_POST["description"])
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }   
}

function updateMenu($dbh)
{
    try {
        $query = 'update menu set menuNom = :menuNom, menuPrix = :menuPrix, menuDescription = :menuDescription where menuId = :menuId';
        $updateRestaurant = $dbh->prepare($query);
        $updateRestaurant -> execute([
            'menuNom' => htmlentities($_POST["nom"]),
            'menuPrix' => htmlentities($_POST["prix"]),
            'menuDescription' => htmlentities($_POST["description"]),
            'menuId' => $_GET["menuId"]
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function deleteMenuRestaurant($dbh)
{
    try {
        $query = 'delete from menu_restaurant where restaurantId = :restaurantId';
        $deleteMenuRestaurant = $dbh->prepare($query);
        $deleteMenuRestaurant -> execute([
            'restaurantId' => $_GET["restaurantId"]
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}