<section class="hero-banner d-flex align-items-center">
    <div class="container text-center">
        <h2>Liste des posts</h2>
    </div>
</section>
<section class="latest-blog-area area-padding">
    <div class="container">
        <div class="section-top-border">
            <h3 class="mb-30 title_color">Liste des posts</h3>            
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">id</div>
                        <div class="country">Titre</div>
                        <div class="country">Statut</div>
                        <div class="visit">Modifier</div>
                        <div class="percentage">Supprimer</div>
                    </div>
                    <?php
                    foreach ($posts as $value) {
                    ?>
                        <div class="table-row">                            
                            <div class="serial"><?= $value->getId(); ?></div>
                            <div class="country"><?= $value->getTitle(); ?></div>
                            <div class="country"><?=$value->getPublished(); ?></div>  
                            <div class="visit"><a href="index.php?controller=Post&action=modifier&id=<?= $value->getId(); ?>">Modifier</a></div>
                            <div class="percentage"><a href="index.php?controller=Post&action=supprimer&id=<?= $value->getId(); ?>&token=<?= $_SESSION['token']; ?>"  onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet article'));">Supprimer</a></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>