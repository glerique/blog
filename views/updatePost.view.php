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
                  Contenu : <input class="form-control" type="text" name="content" value="<?= $post->getContent(); ?>">
                </div>
              </div>             
              <div class="col-12">
                <div class="form-group">
                  Statut : <select class="form-control" name="published">
                <option value="En attente" <?php if($post->getPublished()=="En attente") {echo "selected";} ?>>En attente</option>
                <option value="Publié"  <?php if($post->getPublished()=="Publié") {echo "selected";} ?>>Publié</option>                           
                </select>
                </div>               
              </div>
              <div class="col-12">
                <div class="form-group">
                          <input class="form-control" type="hidden" name="userId" value="<?= $post->getUserId(); ?>">
                </div>
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