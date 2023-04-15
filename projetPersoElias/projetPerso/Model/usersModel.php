<?php

function createUser($dbh)
{
    try {
        $query = 'insert into utilisateur(utilisateurNom, utilisateurPrenom, utilisateurAdresse, utilisateurMDP, utilisateurEmail, utilisateurAnniversaire) values (:utilisateurNom, :utilisateurPrenom, :utilisateurAdresse, :utilisateurMDP, :utilisateurEmail, :utilisateurAnniversaire)';
        $ajouteUser = $dbh->prepare($query);
        $ajouteUser -> execute([
            'utilisateurNom' => $_POST["nom"],
            'utilisateurPrenom' => $_POST["prenom"],
            'utilisateurAdresse' => $_POST["adresse"],
            'utilisateurMDP' => $_POST["mot_de_passe"],
            'utilisateurEmail' => $_POST["email"],
            'utilisateurAnniversaire' => $_POST["anniversaire"],
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
        $query = 'update utilisateur set utilisateurNom = :utilisateurNom, utilisateurPrenom = :utilisateurPrenom, utilisateurAdresse = :utilisateurAdresse, utilisateurMDP = :utilisateurMDP';
        $ajouteUser = $dbh->prepare($query);
        $ajouteUser -> execute([
            'utilisateurNom' => $_POST["nom"],
            'utilisateurPrenom' => $_POST["prenom"],
            'utilisateurAdresse' => $_POST["adresse"],
            'utilisateurMDP' => $_POST["mot_de_passe"],
        ]);
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}