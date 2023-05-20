<h1>Les menu du restaurant</h1>
<?php foreach ($menus as $menu) : ?>
    <div class="center blocMenu">
        <p class="nomPrix flexible justify-content-space-around"><span><?= $menu->menuNom ?></span> - <span><?= $menu->menuPrix ?> €</span></p>
        <p class="description"><?= $menu->menuDescription ?></p>
        <button><a href="voirRestaurant?restaurantId=<?= $menu->menuId ?>" class="button ">Modifier</a></button> 
    </div>
<?php endforeach ?>