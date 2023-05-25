<h1>Vos messages</h1>

<?php foreach ($allMessages as $allMessage ) : ?>
    <p class="center"><span><?= $names->utilisateurNom ?></span> <span><?= $allMessage->messageText ?></span></p>
<?php endforeach ?>
<form method="post" action="">
    <fieldset>
        <legend>Ajouter un message</legend>
        <div>
            <label for="mesage">Votre message</label>
            <input type="textarea" placeholder="Ecrivez votre message..." id="mesage" name="mesage">
            <?php if(isset($messageError["mesage"])) : ?><small><?= $messageError["mesage"] ?></small><?php endif ?>
        </div>
        <div>
            <button name="btnEnvoi" value="envoyer">Envoyer</button>
        </div>
    </fieldset>
</form>