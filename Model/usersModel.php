<?php

function createUser($dbh)
{
    try {
        $query = 'insert into utilisateur(utilisateurNom, utilisateurPrenom, utilisateurAdresse, utilisateurMDP, utilisateurEmail, utilisateurAnniversaire, utilisateurRole) values (:utilisateurNom, :utilisateurPrenom, :utilisateurAdresse, :utilisateurMDP, :utilisateurEmail, :utilisateurAnniversaire, :utilisateurRole)';
        $ajouteUser = $dbh->prepare($query);
        $ajouteUser -> execute([
            'utilisateurNom' => $_POST["nom"],
            'utilisateurPrenom' => $_POST["prenom"],
            'utilisateurAdresse' => $_POST["adresse"],
            'utilisateurMDP' => $_POST["mot_de_passe"],
            'utilisateurEmail' => $_POST["email"],
            'utilisateurAnniversaire' => $_POST["anniversaire"],
            'utilisateurRole' => isset($_POST["role"]) ? 'Restaurateur' : 'Client',
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function connectUser($dbh)
{
    try {
        $query = 'select * from utilisateur where utilisateurEmail = :utilisateurEmail and utilisateurMDP = :utilisateurMDP';
        $connectUser = $dbh->prepare($query);
        $connectUser -> execute([
            'utilisateurMDP' => $_POST["mot_de_passe"],
            'utilisateurEmail' => $_POST["email"],
        ]);
        $user = $connectUser->fetch();
        $_SESSION["user"] = $user;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function updateUser($dbh)
{
    try {
        $query = 'update utilisateur set utilisateurNom = :utilisateurNom, utilisateurPrenom = :utilisateurPrenom, utilisateurAdresse = :utilisateurAdresse, utilisateurMDP = :utilisateurMDP where utilisateurId= :utilisateurId';
        $ajouteUser = $dbh->prepare($query);
        $ajouteUser -> execute([
            'utilisateurNom' => $_POST["nom"],
            'utilisateurPrenom' => $_POST["prenom"],
            'utilisateurAdresse' => $_POST["adresse"],
            'utilisateurMDP' => $_POST["mot_de_passe"],
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function deleteUser($dbh)
{
    try {
        $query = 'delete from utilisateur where utilisateurId = :utilisateurId';
        $ajouteUser = $dbh->prepare($query);
        $ajouteUser -> execute([
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function updateSession($dbh)
{
    try {
        $query = 'select * from utilisateur where utilisateurId = :utilisateurId';
        $selectUser = $dbh->prepare($query);
        $selectUser -> execute([
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
        $user = $selectUser->fetch();
        $_SESSION["user"] = $user;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function verifEmptyData(){
    foreach($_POST as $key => $value){
        if(empty(str_replace(' ', '', $value))){
            $messageError[$key] = "Votre " . $key . " est vide.";
        }
    }
    if(isset($messageError)){
        return $messageError;
    }else {
        return false;
    }
}