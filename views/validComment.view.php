<section class="hero-banner d-flex align-items-center">
  <div class="container text-center">
    <h2>Valider un Commentaire</h2>
  </div>
</section>
<section class="contact-section area-padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Valider un commentaire</h2>
      </div>
      <div class="col-lg-8">
        <form class="form-contact contact_form" method="post" action="index.php?controller=Comment&action=validComment">
          <div class="row">

            <input class="form-control" type="hidden" name="id" value="<?= $comment->getId(); ?>">

            <div class="col-12">
              <div class="form-group">
                Titre de l'article : <input class="form-control" type="text" name="title" value="<?= $comment->getTitle(); ?>" readonly>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Commentaire : <input class="form-control" type="text" name="title" value="<?= $comment->getContent(); ?>" readonly>
              </div>
            </div>

            <input class="form-control" type="hidden" name="validated" value="2">
            <input class="form-control" type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
          </div>
          <div class="form-group mt-3">
            <input type="submit" class="button button-contactForm" name="valider" value="valider">
            <input type="button" class="button button-contactForm" value="Retour" onClick="document.location.href = document.referrer" />
          </div>
        </form>
      </div>
    </div>
</div>
</section>