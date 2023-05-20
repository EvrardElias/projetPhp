<?php

function selectAllNourriture($dbh)
{
    try {
        $query = 'select * from nourriture';
        $selectNourriture = $dbh->prepare($query);
        $selectNourriture->execute([]);
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

function deleteNourritureRestaurant($dbh)
{
    try {
        $query = 'delete from nourriture_restaurant where restaurantId = :restaurantId';
        $deleteNourritureRestaurant = $dbh->prepare($query);
        $deleteNourritureRestaurant -> execute([
            'restaurantId' => $_GET["restaurantId"]
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function selectOneNourriture($dbh)
{
    try {
        $query = 'select * from nourriture where nourritureId in (select nourritureId from nourriture_restaurant where restaurantId = :restaurantId)';
        $selectNourritures = $dbh->prepare($query);
        $selectNourritures -> execute([
            'restaurantId' => $_GET["restaurantId"]
        ]);
        $nourritures = $selectNourritures->fetchAll();
        return $nourritures;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}