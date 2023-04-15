<h1>Page profil</h1>
<p><?= $_SESSION["user"]->utilisateurNom ?></p>
<p><?= $_SESSION["user"]->utilisateurPrenom ?></p>
<p><?= $_SESSION["user"]->utilisateurAdresse ?></p>
<p><?= $_SESSION["user"]->utilisateurMDP ?></p>
<p><?= $_SESSION["user"]->utilisateurEmail ?></p>
<p><?= $_SESSION["user"]->utilisateurAnniversaire ?></p>
<a href="updateProfil">Modifier</a>