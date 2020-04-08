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
              <div class="col-12">
                <div class="form-group">
                        <input class="form-control" type="hidden" name="id" value="<?= $comment->getId(); ?>">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Titre : <input class="form-control" type="text" name="title" value="<?= $comment->getContent(); ?>" readonly>
                </div>
              </div>                    
              <div class="col-12">
                <div class="form-group">
                  Statut : <select class="form-control" name="validated">
                <option value="0" <?php if($comment->getValidated()=="0") {echo "selected";} ?>>En attente</option>
                <option value="1"  <?php if($comment->getValidated()=="1") {echo "selected";} ?>>Validé</option>                           
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