<section class="hero-banner d-flex align-items-center">
    <div class="container text-center">
        <h2>Liste des utilisateurs</h2>
    </div>
</section>
<section class="latest-blog-area area-padding">
    <div class="container">
        <div class="section-top-border">
            <h3 class="mb-30 title_color">Liste des utilisateurs</h3>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">id</div>
                        <div class="serial">Pseudo</div>
                        <div class="serial">Droit</div>
                        <div class="serial">Modifier</div>
                    </div>
                    <?php
                    foreach ($users as $value) {
                    ?>
                        <div class="table-row">
                            <div class="serial"><?= $value->getId(); ?></div>
                            <div class="serial"><?= $value->getNickname(); ?></div>
                            <div class="serial"><?= $value->getUserRole(); ?></div>
                            <div class="serial"><a href="index.php?controller=User&action=modifier&id=<?= $value->getId(); ?>">Modifier</a></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>