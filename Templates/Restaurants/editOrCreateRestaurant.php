<div class="form-container">
    <form method="post" action="">
        <fieldset>
            <legend><?php if(isset($restaurant)) : ?>Modifier le restaurant <?php else : ?> Ajouter un restaurant <?php endif ?></legend>
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
                    <input type="time" placeholder="Heure de fin de livraison" id="horaire" name="horaire" value="<?= isset($restaurant) ? $heure : '' ?>">
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
                            <option value="<?= $nourriture->nourritureId ?>" <?php if(isset($restaurant)):?> <?php foreach($nourrituresRestaurant as $nourritureRestaurant) : ?><?= $nourriture->nourritureId === $nourritureRestaurant->nourritureId ? 'selected' : '' ?><?php endforeach ?><?php endif ?>><?= $nourriture->nourritureType ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <label for="etoile">Nombre d'étoile</label>
                    <select id="etoile" name="etoile">
                        <?php foreach($etoiles as $etoile) : ?>
                            <option value="<?= $etoile->etoileId ?>"  <?= isset($restaurant) && $etoile->etoileId === $etoilesRestaurant->etoileId ? 'selected' : '' ?>><?= $etoile->etoileNombre ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <button name="btnEnvoi" value="envoyer"><?php if(isset($restaurant)) : ?> Modifier <?php else : ?> Ajouter <?php endif ?></button>
                    <?php if(isset($restaurant)) : ?>
                        <button name="btnEnvoi" value="envoyer">Voir menu</button>
                    <?php endif ?>
                </div>
        </fieldset>
    </form>
</div>
