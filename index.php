<?php
    session_start();
    require_once "Config/cbdd.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/flex.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/formulaire.css">
    <link rel="icon" href="Images/fe.png">
    <title>FoodEx</title>
</head>
<body>

    <header>
        <input type="checkbox" id="openmenu" class="barre-checkbox">
        <div class="barre-icon">
            <label for="openmenu" id="barre-label">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <div class="vitre-menu">
            <nav>
                <ul class="lien-menu">
                        <li><a href="/">Accueil</a></li>
                    <?php if (isset($_SESSION["user"])) : ?>
                        <li><a href="profil">Profil</a></li>
                        <li><a href="deconnexion">Déconnexion</a></li>
                        <?php if ($_SESSION['user']->utilisateurRole === 'Restaurateur'): ?>
                            <li><a href="ajouterRestaurant">Ajouter un restaurant</a></li>
                            <li><a href="mesRestaurants">Voir mes restaurants</a></li>
                        <?php endif ?>
                    <?php else : ?>
                        <li><a href="connexion">Connexion</a></li>
                        <li><a href="inscription">Inscription</a></li>
                    <?php endif ?>
                </ul>
            </nav>
        </div>
        <div class="flexible justify-content-center logo">
            <img src="Images/foodex.png" alt="Logo FoodEx">
        </div>
    </header>
    
    <main>
        <?php 
            require_once "Controllers/restaurantsController.php";
            require_once "Controllers/usersController.php";
        ?>
    </main>
    <footer>
        <div class="flexible justify-content-center logo">
            <img src="Images/monLogo.png" alt="Mon Logo">
        </div>
    </footer>
</body>
</html>