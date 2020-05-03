<section class="hero-banner d-flex align-items-center">
  <div class="container text-center">
    <h2>Ajouter un Post</h2>
  </div>
</section>
<section class="contact-section area-padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Ajouter un Post</h2>
      </div>
      <div class="col-lg-8">
        <form class="form-contact contact_form" method="post" action="index.php?controller=Post&action=ajouterPost">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                Titre : <input class="form-control" type="text" name="title">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Chapo : <input class="form-control" type="text" name="standfirst">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Contenu : <textarea class="form-control w-100" name="content" cols="30" rows="9" placeholder="Ecrire le contenu de l'article"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Auteur(e) : <input class="form-control" type="text" name="author">
              </div>
            </div>
          </div>
          <input class="form-control" type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
          <div class="form-group mt-3">
            <input type="submit" class="button button-contactForm" name="ajouter" value="poster">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>