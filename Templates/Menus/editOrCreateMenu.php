<div class="form-container">
    <form method="post" action="">
        <fieldset>
            <legend><?php if(isset($menus)) : ?>Modifier le menu <?php else : ?> Ajouter un menu <?php endif ?></legend>
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php if(isset($menus)) : ?><?= $menus->menuNom ?> <?php endif ?>">
                    <?php if(isset($messageError["nom"])) : ?><small><?= $messageError["nom"] ?></small><?php endif ?>
                </div>
                <div>
                    <label for="prix">Prix</label>
                    <input type="text" placeholder="Prix" id="prix" name="prix" value="<?php if(isset($menus)) : ?><?= $menus->menuPrix ?> <?php endif ?>">
                    <?php if(isset($messageError["prix"])) : ?><small><?= $messageError["prix"] ?></small><?php endif ?>
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" placeholder="Description" id="description" name="description" value="<?php if(isset($menus)) : ?><?= $menus->menuDescription ?> <?php endif ?>">
                    <?php if(isset($messageError["description"])) : ?><small><?= $messageError["description"] ?></small><?php endif ?>
                </div>
                <div>
                    <button name="btnEnvoi" value="envoyer"><?php if(isset($restaurant)) : ?> Modifier <?php else : ?> Ajouter <?php endif ?></button>
                    <?php if(isset($menus)) : ?>
                        <button><a href="updateMenu?restaurantId=<?= $restaurant->restaurantId ?>" class="button ">Modifier menu</a></button>
                    <?php endif ?>
                </div>
        </fieldset>
    </form>
</div>