<div class="form-container styleProfil">
    <fieldset>
        <legend>Profil</legend>
        <div>
            <p class="sousTitre">Nom :</p>
            <p class="profil"><?= $_SESSION["user"]->utilisateurNom ?></p>
        </div>
        <div>
            <p class="sousTitre">Prenom :</p>
            <p class="profil"><?= $_SESSION["user"]->utilisateurPrenom ?></p>
        </div>
        <div>
            <p class="sousTitre">Adresse :</p>
            <p class="profil"><?= $_SESSION["user"]->utilisateurAdresse ?></p>
        </div>
        <div>
            <p class="sousTitre">Mot de passe :</p>
            <p class="profil"><?= $_SESSION["user"]->utilisateurMDP ?></p>
        </div>
        <div>
            <p class="sousTitre">Adresse Email :</p>
            <p class="profil"><?= $_SESSION["user"]->utilisateurEmail ?></p>
        </div>
        <div>
            <p class="sousTitre">Anniversaire :</p>
            <p class="profil"><?= $_SESSION["user"]->utilisateurAnniversaire ?></p>
        </div>
        <div>
            <p class="sousTitre">Rôle :</p>
            <p class="profil"><?= $_SESSION["user"]->utilisateurRole ?></p>
        </div>
        <div class="flexible justify-content-space-around">
            <a class="modifier" href="updateProfil">Modifier</a>
            <a class="supprimer" href="deleteProfil">Supprimer</a>
        </div>
    </fieldset>
</div>