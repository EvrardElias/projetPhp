<?php

function selectAllNourriture($dbh)
{
    try {
        $query = 'select * from nourriture';
        $typeNourriture = $dbh->prepare($query);
        $typeNourriture->execute();
        $typeNourriture = $typeNourriture->fetchAll();
        return $typeNourriture;
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