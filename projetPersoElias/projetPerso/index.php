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
    <title>Document</title>
</head>
<body>
    <header>
         <ul class="menu">
            <a href="/">Accueil</a>
            <?php if (isset($_SESSION["user"])) : ?>
                <a href="profil">Profil</a>
                <a href="deconnexion">Déconnexion</a>
                <?php else : ?>
                <a href="connexion">Connexion</a>
                <a href="inscriptionEdit">Inscription</a>
            <?php endif ?>
         </ul>
    </header>
    <main>
        <?php 
            require_once "Controllers/restaurantsController.php";
            require_once "Controllers/usersController.php";
        ?>
    </main>
    <footer>
        <h1>Ce sera un footer</h1>
    </footer>
</body>
</html>