<?php

function selectNourritureRestaurant($dbh)
{
    try {
        $query = 'select * from nourriture where nourritureId in (select nourritureId from nourriture_restaurant where restaurantId = :restaurantId)';
        $selectNourriture = $dbh->prepare($query);
        $selectNourriture->execute([
            'restaurantId' => $_GET["restaurantId"]
        ]);
        $nourritures = $selectNourriture->fetchAll();
        return $nourritures;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function ajouterNourritureRestaurant($dbh, $restaurantId, $nourritureId )
{
    try {
        $query = 'insert into nourriture_restaurant (nourritureId, restaurantId) values (:nourritureId, :restaurantId)';
        $typeNourriture = $dbh->prepare($query);
        $typeNourriture->execute([
            'restaurantId' => $restaurantId,
            'nourritureId' => $nourritureId
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}