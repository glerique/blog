<section class="hero-banner d-flex align-items-center">
  <div class="container text-center">
    <h2>Login</h2>
  </div>
</section>
<section class="contact-section area-padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="contact-title" Login>Login</h2>
      </div>
      <div class="col-lg-8">
        <form class="form-contact contact_form" method="post" action="index.php?controller=User&action=authentification">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                Email : <input class="form-control" type="email" name="email">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                Mot de passe : <input class="form-control" type="password" name="pswd">
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="submit" class="button button-contactForm" name="login" value="login">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>