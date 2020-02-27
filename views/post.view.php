<section class="hero-banner d-flex align-items-center">
        <div class="container text-center">
            <h2>Fiche</h2>            
        </div>
    </section>
 
    <section class="contact-section area-padding">
    <div class="container">
              <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Fiche</h2>
          <?php
        $post = $manager->getPost($_GET['id']);
        ?>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" method="post">
            <div class="row">           
              <div class="col-12">
                <div class="form-group">
                    Id : <input class="form-control" type="text" name="id" value="<?= $post->getId(); ?>" disabled>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Titre : <input class="form-control" type="text" name="titre" value="<?= $post->getTitre(); ?>" disabled>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Chapo : <input class="form-control" type="text" name="chapo" value="<?= $post->getChapo(); ?>" disabled>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Contenu : <input class="form-control" type="text" name="contenu" value="<?= $post->getContenu(); ?>" disabled>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Date ajout : <input class="form-control" type ="date" name="dateAjout"  value="<?= $post->getDateAjout(); ?>" disabled>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Date modification : <input class="form-control" type ="date" name="dateModification" value="<?= $post->getDateModification(); ?>" disabled>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Statut : <input class="form-control" type="text" name="statut"  value="<?= $post->getStatut(); ?>" disabled>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                UtilisateurID : <input class="form-control" type="text" name="utilisateurId" value="<?= $post->getUtilisateurId(); ?>" disabled>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
            <a href="index.php">Retour</a>
            </div>
          </form>
        </div>       
      </div>
    </div>
</section>