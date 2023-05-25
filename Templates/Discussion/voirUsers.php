<h1>Discussion</h1>

<div class="flexible center">
    <?php foreach ($users as $user) : ?>
        <div class="cadreResto">
            <h2 class="center"><span><?= $user->utilisateurNom ?></span> <span><?= $user->utilisateurPrenom ?></span></h2>
            <div>
                <div class="center">
                    <div class="flexible"></div>
                        <a class="modifier" href="/voirConversation?conversationId= <?= $conversations->conversationId ?> ">Discuter</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>