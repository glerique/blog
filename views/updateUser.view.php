<section class="hero-banner d-flex align-items-center">
        <div class="container text-center">
            <h2>Modifier</h2>            
        </div>
    </section>
     <section class="contact-section area-padding">
    <div class="container">
              <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Modifier</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" method="post" action="index.php?controller=User&action=updateUser">
            <div class="row">           
              <div class="col-12">
                <div class="form-group">
                    Id : <input class="form-control" type="text" name="id" value="<?= $user->getId(); ?>">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Nom : <input class="form-control" type="text" name="lastName" value="<?= $user->getLastName(); ?>">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Prénom : <input class="form-control" type="text" name="firstName" value="<?= $user->getFirstName(); ?>">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Email : <input class="form-control" type="text" name="email" value="<?= $user->getEmail(); ?>">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Nickname : <input class="form-control" type ="text" name="nickname" value="<?= $user->getNickname(); ?>">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Mot de passe : <input class="form-control" type ="text" name="pswd" value="<?= $user->getPswd(); ?>">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Role : <input class="form-control" type="text" name="userRole" value="<?= $user->getUserRole(); ?>">
                </div>
              </div>              
            <div class="form-group mt-3">
           <input type="submit" class="button button-contactForm" name="modifier" value="modifier">
            </div>
          </form>
        </div>       
      </div>
    </div>
</section>