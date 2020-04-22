<section class="hero-banner d-flex align-items-center">
  <div class="container text-center">
    <h2>Modifier un Post</h2>
  </div>
</section>
<section class="contact-section area-padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Modifier un Post</h2>
      </div>
      <div class="col-lg-8">
        <form class="form-contact contact_form" method="post" action="index.php?controller=Post&action=modifierPost">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <input class="form-control" type="hidden" name="id" value="<?= $post->getId(); ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Titre : <input class="form-control" type="text" name="title" value="<?= $post->getTitle(); ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Chapo : <input class="form-control" type="text" name="standfirst" value="<?= $post->getStandfirst(); ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Contenu : <textarea class="form-control w-100" name="content" cols="30" rows="9"><?= $post->getContent(); ?></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Auteur(e) : <input class="form-control" type="text" name="author" value="<?= $post->getAuthor(); ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Statut : <select class="form-control" name="published">
                  <option value="En attente" <?php if ($post->getPublished() == "En attente") {
                                                echo "selected";
                                              } ?>>En attente</option>
                  <option value="Publié" <?php if ($post->getPublished() == "Publié") {
                                            echo "selected";
                                          } ?>>Publié</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <input class="form-control" type="hidden" name="userId" value="<?= $post->getUserId(); ?>">
              </div>
            </div>
            <input class="form-control" type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
          </div>
          <div class="form-group mt-3">
            <input type="submit" class="button button-contactForm" name="modifier" value="Modifier">
            <input type="button" class="button button-contactForm" value="Retour" onClick="document.location.href = document.referrer" />

          </div>
        </form>
      </div>
    </div>
  </div>
</section>