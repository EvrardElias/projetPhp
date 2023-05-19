<h1>Page d'acceuil</h1>

<div class="flexible justify-content-space-around wrap">
    <?php foreach ($restaurants as $restaurant) : ?>
        <div class="cadreResto">
            <h2 class="center"><?= $restaurant->restaurantNom ?></h2>
            <div>
                <div class="blocImageResto"><img src="<?= $restaurant->restaurantLogo ?>" alt="Logo du restaurant" /></div>
                <div class="center">
                    <p><span><?= $restaurant->restaurantHoraire ?></span> - <span><?= $restaurant->restaurantVille ?></span></p>
                    <h3><?= phoneNumberFormatted($restaurant->restaurantNumeroTel) ?></h3>
                    <button><a href="voirRestaurant?restaurantId=<?= $restaurant->restaurantId ?>" class="button ">Passer commande</a></button>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>