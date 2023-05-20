<h1>Page d'acceuil</h1>

<div class="flexible justify-content-space-around wrap">
    <?php foreach ($restaurants as $restaurant) : ?>
        <?php $heure = substr($restaurant->restaurantHoraire, 0, 5); ?>
        <div class="cadreResto">
            <h2 class="center"><?= $restaurant->restaurantNom ?></h2>
            <div>
                <div class="blocImageResto"><img src="<?= $restaurant->restaurantLogo ?>" alt="Logo du restaurant" /></div>
                <div class="center">
                    <p><span><?= $heure ?></span> - <span><?= $restaurant->restaurantVille ?></span></p>
                    <h3><?= phoneNumberFormatted($restaurant->restaurantNumeroTel) ?></h3>
                    <?php if($uri === "/mesRestaurants") : ?>
                        <div class="flexible"></div>
                        <a href="deleteRestaurant?restaurantId=<?= $restaurant->restaurantId ?>" class="supprimer ">Supprimer le restaurant</a>
                        <a href="updateRestaurant?restaurantId=<?= $restaurant->restaurantId ?>" class="modifier ">Modifier le restaurant</a>
                    <?php else : ?>
                        <a href="voirRestaurant?restaurantId=<?= $restaurant->restaurantId ?>" class="commande ">Passer commande</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>