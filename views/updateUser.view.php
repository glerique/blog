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
                    <input class="form-control" type="hidden" name="id" value="<?= $user->getId(); ?>">
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
                  Nickname : <input class="form-control" type ="text" name="nickname" value="<?= $user->getNickname(); ?>">
                </div>
              </div> 
              <div class="col-12">
                <div class="form-group">
                  Role : <select class="form-control" name="userRole">
                <option value="Membre" <?php if($user->getUserRole()=="Membre") {echo "selected";} ?>>Membre</option>
                <option value="Admin"  <?php if($user->getUserRole()=="Admin") {echo "selected";} ?>>Admin</option>                           
                </select>
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