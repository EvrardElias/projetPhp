<div class="form-container">
    <form method="post" action="">
        <fieldset>
            <legend>Ajouter un restaurant</legend>
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php if(isset($restaurant)) : ?><?= $restaurant->restaurantNom ?> <?php endif ?>">
                    <?php if(isset($messageError["nom"])) : ?><small><?= $messageError["nom"] ?></small><?php endif ?>
                </div>
                <div>
                    <label for="adresse">Ville</label>
                    <input type="text" placeholder="Ville" id="ville" name="ville" value="<?php if(isset($restaurant)) : ?><?= $restaurant->restaurantVille ?> <?php endif ?>">
                    <?php if(isset($messageError["ville"])) : ?><small><?= $messageError["ville"] ?></small><?php endif ?>
                </div>
                <div>
                    <label for="telephone">Numero de Telephone</label>
                    <input type="text" placeholder="Numero de Telephone" id="telephone" name="telephone" value="<?php if(isset($restaurant)) : ?><?= $restaurant->restaurantNumeroTel ?> <?php endif ?>">
                    <?php if(isset($messageError["telephone"])) : ?><small><?= $messageError["telephone"] ?></small><?php endif ?>
                </div>
                <div>
                    <label for="horaire">Heure de fin de livraison</label>
                    <input type="time" placeholder="Heure de fin de livraison" id="horaire" name="horaire" value="<?php if(isset($restaurant)) : ?><?= $restaurant->restaurantHoraire ?> <?php endif ?>">
                    <?php if(isset($messageError["horaire"])) : ?><small><?= $messageError["horaire"] ?></small><?php endif ?>
                </div>
                <div>
                    <label for="logo">Logo</label>
                    <input type="text" placeholder="Lien du logo" id="logo" name="logo" value="<?php if(isset($restaurant)) : ?><?= $restaurant->restaurantLogo ?> <?php endif ?>">
                    <?php if(isset($messageError["logo"])) : ?><small><?= $messageError["logo"] ?></small><?php endif ?>
                </div>
                <div>
                    <label for="nourriture">Type de nourriture</label>
                    <select id="nourriture" name="nourriture[]" multiple>
                        <?php foreach($nourritures as $nourriture) : ?>
                            <option value="<?= $nourriture->nourritureId ?>"><?= $nourriture->nourritureType ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <label for="etoile">Nombre d'étoile</label>
                    <select id="etoile" name="etoile" required>
                        <option value="">--Choisissez le nombre d'étoile--</option>
                        <?php foreach($etoiles as $etoile) : ?>
                            <option value="<?= $etoile->etoileId ?>"><?= $etoile->etoileNombre ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <button name="btnEnvoi" value="envoyer"><?php if(isset($restaurant)) : ?> Modifier <?php else : ?> Ajouter <?php endif ?></button>
                </div>
        </fieldset>
    </form>
</div>