<div class="flexible justify-content-center">   
    <div class="cadreMenu">
        <div class="blocImageResto"><img src="<?= $restaurant->restaurantLogo ?>" alt="Logo du restaurant">
        <h1><?= $restaurant->restaurantNom ?></h1>
        <?php $heure = substr($restaurant->restaurantHoraire, 0, 5); ?>
        <p><span> <?php if(empty($etoiles)) : ?> Il n'y a pas d'étoiles pour l'instant <?php else : ?> <?= $etoiles->etoileNombre ?> ★<?php endif ?></span> - <span> <?php if(empty($nourritures)) : ?> Il n'y pas de de type de nourriture pour l'instant <?php else : ?> <?php foreach($nourritures as $nourriture) :?> <?= $nourriture->nourritureType ?> <?php endforeach?> <?php endif ?></span></p>
        <p><span><?= $restaurant->restaurantVille ?></span> - <span><?= $heure ?></span></p>
        <h1 class="center">Menus</h1>
        <?php if(empty($menus)) : ?>
            <p>Il n'y a pas de menus pour l'instant</p>
        <?php else : ?>
        <?php foreach ($menus as $menu) : ?>
            <div class="center blocMenu">
                <p class="nomPrix flexible justify-content-space-around"><span><?= $menu->menuNom ?></span> - <span><?= $menu->menuPrix ?> €</span></p>
                <p class="description"><?= $menu->menuDescription ?></p>
                <button><a href="voirRestaurant?restaurantId=<?= $menu->menuId ?>" class="button ">Ajouter au panier</a></button> 
            </div>
        <?php endforeach ?>
        <?php endif ?>
        </div>
    </div>
</div>