<div class="flexible justify-content-center">   
    <div class="cadreResto">
        <div class="blocImageResto"><img src="<?= $restaurant->restaurantLogo ?>" alt="Logo du restaurant">
        <h1><?= $restaurant->restaurantNom ?></h1>
        
        <!--<p><span><?= $etoiles->etoileId ?></span> - <span><?= $nourritures->nourritureId ?></span></p>-->
        <p><span><?= $restaurant->restaurantVille ?></span> - <span><?= $restaurant->restaurantHoraire ?></span></p>
        <h1 class="center">Menus</h1>
        <?php foreach ($menus as $menu) : ?>
            <div class="center">
                <p><span><?= $menu->menuNom ?></span> - <span><?= $menu->menuPrix ?></span></p>
                <p><?= $menu->menuDescription ?></p>    
            </div>
        <?php endforeach ?>
        </div>
    </div>
</div>