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