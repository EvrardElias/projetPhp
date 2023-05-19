<?php

function selectAllEtoile($dbh)
{
    try {
        $query = 'select * from etoile';
        $nombreEtoile = $dbh->prepare($query);
        $nombreEtoile->execute();
        $nombreEtoile = $nombreEtoile->fetchAll();
        return $nombreEtoile;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function ajouterEtoileRestaurant($dbh, $restaurantId, $etoileId )
{
    try {
        $query = 'insert into etoile_restaurant (etoileId, restaurantId) values (:etoileId, :restaurantId)';
        $etoileNombre = $dbh->prepare($query);
        $etoileNombre->execute([
            'restaurantId' => $restaurantId,
            'etoileId' => $etoileId
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}