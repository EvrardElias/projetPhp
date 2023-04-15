<h1><?php if(isset($_SESSION["user"])) : ?>Modification du profil<?php else : ?>Page d'inscription<?php endif ?></h1>
<form method="post" action="">
    <fieldset>
        <legend><?php if(isset($_SESSION["user"])) : ?>Modification du profil<?php else : ?>Inscription<?php endif ?></legend>
        <div>
            <label for="nom">Nom</label>
            <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php if(isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->utilisateurNom ?><?php endif ?>">
            <?php if(isset($messageError["nom"])) : ?><small><?= $messageError["nom"] ?></small><?php endif ?>
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" placeholder="Prénom" id="prenom" name="prenom" value="<?php if(isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->utilisateurPrenom ?><?php endif ?>">
            <?php if(isset($messageError["prenom"])) : ?><small><?= $messageError["prenom"] ?></small><?php endif ?>
        </div>
        <div>
            <label for="anniversaire">Date de naissance</label>
            <input type="date" <?php if(isset($_SESSION["user"])) : ?>disabled<?php endif ?> placeholder="Date de Naissance" id="anniversaire" name="anniversaire" value="<?php if(isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->utilisateurAnniversaire ?><?php endif ?>">
            <?php if(isset($messageError["anniversaire"])) : ?><small><?= $messageError["anniversaire"] ?></small><?php endif ?>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" <?php if(isset($_SESSION["user"])) : ?>disabled<?php endif ?> placeholder="Email" class="form-control" id="email" name="email" value="<?php if(isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->utilisateurEmail ?><?php endif ?>">
            <?php if(isset($messageError["email"])) : ?><small><?= $messageError["email"] ?></small><?php endif ?>
        </div>
        <div>
            <label for="adresse">Adresse</label>
            <input type="text" placeholder="Adresse" id="adresse" name="adresse" value="<?php if(isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->utilisateurAdresse ?><?php endif ?>">
            <?php if(isset($messageError["adresse"])) : ?><small><?= $messageError["adresse"] ?></small><?php endif ?>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="<?php if(isset($_SESSION["user"])) : ?>text<?php else : ?>password<?php endif ?>" placeholder="Mot de passe" id="password" name="mot_de_passe" value="<?php if(isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->utilisateurMDP ?><?php endif ?>">
            <?php if(isset($messageError["mot_de_passe"])) : ?><small><?= str_replace("_", " ", $messageError["mot_de_passe"]) ?></small><?php endif ?>
        </div>
        <div>
            <button name="btnEnvoi" value="envoyer"><?php if(isset($_SESSION["user"])) : ?>Modifier<?php else : ?>Envoyer<?php endif ?></button>
        </div>
    </fieldset>
</form>