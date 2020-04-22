<section class="hero-banner d-flex align-items-center">
    <div class="container text-center">
        <h2>Commentaires</h2>
    </div>
</section>
<section class="latest-blog-area area-padding">
    <div class="container">
        <div class="section-top-border">
            <h3 class="mb-30 title_color">Commentaires en attente</h3>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">id</div>
                        <div class="serial">commentaire</div>
                        <div class="serial">Auteur(e)</div>
                        <div class="serial">Valider</div>
                        <div class="serial">Supprimer</div>
                    </div>
                    <?php
                    foreach ($comments as $value) {
                    ?>
                        <div class="table-row">
                            <div class="serial"><?= $value->getId(); ?></div>
                            <div class="serial"><?= $value->getContent(); ?></div>
                            <div class="serial"><?= $value->getAuthor(); ?></div>
                            <div class="serial"><a href="index.php?controller=Comment&action=valider&id=<?= $value->getId(); ?>">Valider</a></div>
                            <div class="serial"><a href="index.php?controller=Comment&action=supprimer&id=<?= $value->getId(); ?>&token=<?= $_SESSION['token']; ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet article'));">Supprimer</a></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>