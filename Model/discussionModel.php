<?php

function selectAllUsers($dbh)
{
    try {
        $query = 'select * from utilisateur where utilisateurId != :utilisateurId';
        $selectAllUsers = $dbh->prepare($query);
        $selectAllUsers -> execute([
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
        $utilisateurs = $selectAllUsers->fetchAll();
        return $utilisateurs;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function verifConversionBinaire($dbh)
{
    try{
        $query = 'select * from utilisateur_conversation natural join conversation where utilisateurId = :utilisateurId and conversationId in (SELECT conversationId FROM utilisateur_conversation where utilisateurId = :utilisateurId) and conversationType = "binaire"';
        $verifConversationBinaire = $dbh->prepare($query);
        $verifConversationBinaire -> execute([
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
        $verifs = $verifConversationBinaire->fetchAll();
        return $verifs;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
 }

 function selectAllMessages($dbh)
{
    try {
        $query = 'select * from conversation where conversationId in (select conversationId from message where conversationId = :conversationId)';
        $selectAllMessages = $dbh->prepare($query);
        $selectAllMessages -> execute([
            'conversationId' => $_GET["conversationId"]
        ]);
        $allMessages = $selectAllMessages->fetchAll();
        return $allMessages;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function selectNameUser($dbh)
{
    try {
        $query = 'select utilisateurNom and utilisateurPrenom from utilisateur where utilisateurId in (select utilisateurId from utilisateur_conversation where utilisateurId = :utilisateurId)';
        $selectName = $dbh->prepare($query);
        $selectName -> execute([
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
        $names = $selectName->fetchAll();
        return $names;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}

function selectOneConversation($dbh)
{
    try {
        $query = 'select * from conversation where conversationId = :conversationId';
        $selectConversation= $dbh->prepare($query);
        $selectConversation -> execute([
            'conversationId' => $_GET["conversationId"]
        ]);
        $conversations = $selectConversation->fetch();
        return $conversations;
    } catch (PDOException $e) {
        $message = $e ->getMessage();
        die($message);
    }
}