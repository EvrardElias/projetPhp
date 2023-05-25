<?php

require_once "Model/discussionModel.php";
require_once "Model/usersModel.php";

if ($uri === "/discussion") {

    $users = selectAllUsers($dbh);
    require_once "Templates/Discussion/voirUsers.php";

} elseif (isset($_GET["conversationId"]) && $uri === "/voirConversation?conversationId=" . $_GET["conversationId"]) {
    
    $conversations = selectOneConversation($dbh);
    var_dump($conversations);
    if (isset($_POST['btnEnvoi'])) {
        $verifs = verifConversionBinaire($dbh);
    }
    $names = selectNameUser($dbh);
    $allMessages = selectAllMessages($dbh, $_GET["conversationId"]);
    require_once "Templates/Discussion/editOrCreateDiscussion.php";

}