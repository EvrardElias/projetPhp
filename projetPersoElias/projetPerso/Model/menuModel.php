<?php

function selectMenuByRestaurant($dbh, $restaurantId)
{
    try {
        $query = 'select * from menu where menuId in (select menuId from menu_restaurant where restaurantId = :restaurantId)';
        $selectMenuByRestaurant = $dbh->prepare($query);
        $selectMenuByRestaurant->execute([
            'restaurantId' => $restaurantId
        ]);
        $selectMenuByRestaurant = $selectMenuByRestaurant->fetchAll();
        return $selectMenuByRestaurant;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}