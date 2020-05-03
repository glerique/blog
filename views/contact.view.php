<section class="hero-banner d-flex align-items-center">
  <div class="container text-center">
    <h2>Contact</h2>
  </div>
</section>
<section class="contact-section area-padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Formulaire de contact</h2>
      </div>
      <div class="col-lg-8">
        <form class="form-contact contact_form" method="post" action="index.php?controller=Contact&action=message">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                Nom : <input class="form-control" type="text" name="lastname">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Prénom : <input class="form-control" type="text" name="firstname">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Email : <input class="form-control" type="email" name="email">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Sujet : <input class="form-control" type="text" name="subject">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Message : <textarea class="form-control w-100" name="content" cols="30" rows="9" placeholder="Ecrire le contenu du message"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="submit" class="button button-contactForm" name="Envoyer" value="Envoyer">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>