<?php

function selectEtoileRestaurant($dbh)
{
    try {
        $query = 'select * from etoile where etoileId in (select etoileId from etoile_restaurant where restaurantId = :restaurantId)';
        $selectEtoile = $dbh->prepare($query);
        $selectEtoile->execute([
            'restaurantId' => $_GET["restaurantId"]
        ]);
        $etoiles = $selectEtoile->fetchAll();
        return $etoiles;
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