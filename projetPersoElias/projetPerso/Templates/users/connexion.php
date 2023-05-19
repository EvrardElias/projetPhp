<div class="form-container">
    <form method="post" action="">
        <fieldset>
            <legend>Connexion</legend>
            <div>
                <label for="email">Email</label>
                <input type="email" placeholder="Email" id="email" name="email">
                <?php if(isset($messageError["email"])) : ?><small><?= $messageError["email"] ?></small><?php endif ?>
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" placeholder="Mot de passe" id="password" name="mot_de_passe">
                <?php if(isset($messageError["mot_de_passe"])) : ?><small><?= str_replace("_", " ", $messageError["mot_de_passe"]) ?></small><?php endif ?>
            </div>
            <div>
            <button name="btnEnvoi" value="envoyer">Envoyer</button>
            </div>
        </fieldset>
    </form>
</div>