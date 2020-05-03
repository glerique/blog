<section class="hero-banner d-flex align-items-center">
        <div class="container text-center">
            <h2>Inscription</h2>            
        </div>
    </section> 
    <section class="contact-section area-padding">
    <div class="container">
              <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Formulaire d'inscription</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" method="post" action="index.php?controller=User&action=addUser">
            <div class="row">              
              <div class="col-12">
                <div class="form-group">
                  Nom : <input class="form-control" type="text" name="lastName">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Prénom : <input class="form-control" type="text" name="firstName">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Mail : <input class="form-control" type="mail" name="email">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                 Pseudo : <input class="form-control" type ="text" name="nickname">
                </div>
              </div>              
              <div class="col-12">
                <div class="form-group">
                  Mot de passe : <input class="form-control" type ="password" name="pswd">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Confirmez le mot de Passe : <input class="form-control" type ="password" name="confirmPswd">
                </div>
              </div>              
              <div class="col-12">
                <div class="form-group">
                    <input class="form-control" type="hidden" name="userRole" value="membre">
                </div>
              </div>              
            </div>
            <div class="form-group mt-3">
           <input type="submit" class="button button-contactForm" name="ajouter" value="Envoyer">
            </div>
          </form>
        </div>       
      </div>
    </div>
</section>