<section class="hero-banner d-flex align-items-center">
    <div class="container text-center">
        <h2>Liste <?php if (isset($_SESSION['droitId'])){echo $_SESSION['droitId'];} ?></h2>
    </div>
</section>
<section class="latest-blog-area area-padding">
    <div class="container">
        <div class="section-top-border">
            <h3 class="mb-30 title_color">Liste des Posts</h3>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">id</div>
                        <div class="country">Titre</div>
                        <div class="visit">Modifier</div>
                        <div class="percentage">Supprimer</div>
                    </div>
                    <?php
                    foreach ($manager->getListPost() as $value) {
                    ?>
                        <div class="table-row">

                            <div class="serial"><?= $value->getId(); ?></div>
                            <div class="country"><?= $value->getTitre(); ?></div>
                            <div class="visit"><a href="index.php?action=modifier&id=<?= $value->getId(); ?>">Modifier</a></div>
                            <div class="percentage"><a href="index.php?action=supprimer&id=<?= $value->getId(); ?>">Supprimer</a></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>